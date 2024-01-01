<?php namespace App\Http\Controllers;

use App\Http\Controllers\KbvController;

use App\Models\Basic\Sys\Domain;
use App\Models\Seed\Member;

use App\Models\Kbv\KbvMission;
use App\Models\Kbv\KbvLotteries;
use App\Models\Kbv\KbvRelease;
use App\Models\Kbv\KbvLucky;
use App\Models\Basic\Sys\City;
use App\Models\Basic\Media;

use Illuminate\Http\Request;
use Session;
use Validator;
use DB;

class ReportController extends KbvController
{
    public function index()
    {
        if (!$this->access())
            return redirect('/');

        $search = ["name" => '', "city" => '', "number" => '', "product" => '', "seri_no" => ''];
        $s      = session('search_report');
        if ($s) {
            foreach ($s as $key => $value) {
                if ($value)
                    $search[$key] = $value;
            }
        }

        $cities = City::where('country', 'VN')->get();

        $query  = KbvRelease::orderby('created_at', 'desc');

        if ($search['product']) {
            $word  =  $search['product'];
            $terms = explode(" ", $word);

            $query = $query->whereIn('product_id', function ($q) use ($search, $terms) {
                $q  = $q->select('product_id')->from('kbv_missions')
                    ->where('product_name', $search['product'])
                    ->orWhere(function ($query) use ($terms) {
                        foreach ($terms as $term) {
                            $query->where('product_name', 'like', '%' . $term . '%');
                        }
                    });
            });
        }

        if ($search['seri_no'])
            $query  =  $query->where('seri_no', $search['seri_no']);

        if ($search['name'] || $search['city'] || $search['number']) {
            $query = $query->whereIn('mem_id', function ($q) use ($search) {
                $q  =  $q->select('id')->from('members');

                if ($search['name'])
                    $q  =  $q->where('name', 'like', '%' . $search['name'] . '%');
                if ($search['city'])
                    $q  =  $q->where('area', $search['city']);
                if ($search['number'])
                    $q  =  $q->where('code', 'like', '%' . $search['number'] . '%');
            });
        }

        $query  = $query->paginate(6);


        $rows   = $query->map(function ($r) {
            $mem         = Member::find($r->mem_id);
            $p           = KbvMission::Where('product_id', $r->product_id)->first();
            $r->name     = $mem->name;
            $r->code     = $mem->code;
            $r->city      = City::find($mem->area);
            $r->product  = $p ? $p->product_name : '';
            $r->point    = $p ? $p->points : '';
            return $r;
        });


        return view('.report', compact('query', 'rows', 'search', 'cities'));
    }

    public function detail($id)
    {
        if (!$this->access())
            return redirect('/');
    }

    public function search(Request $req)
    {
        session([
            'search_report'  =>  [
                'name'      =>  $req->name,
                'city'      =>  $req->city,
                'number'    =>  $req->number,
                'product'   =>  $req->product,
                'seri_no'  =>   $req->seri_no,
            ]
        ]);

        return redirect()->back();
    }

    public function action(Request $req)
    {


        $release  = KbvRelease::find($req->release_id);

        if (!$release) return;

        $mem      = Member::find($release->mem_id);
        $mission  = KbvMission::where('product_id', $release->product_id)->first();

        $release->delete();
        $mem->withdraw($mission->points, 'Đổi trả SN: #' . $release->seri_no);

        return redirect()->back();
    }
}
