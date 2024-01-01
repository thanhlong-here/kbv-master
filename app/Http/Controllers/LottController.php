<?php namespace App\Http\Controllers;

use App\Http\Controllers\KbvController;

use App\Models\Basic\Sys\Domain;
use App\Models\Basic\Sys\City;
use App\Models\Seed\Member;

use App\Models\Kbv\KbvMission;
use App\Models\Kbv\KbvLucky;
use App\Models\Kbv\KbvLotteries;

use App\Models\Basic\Media;

use Illuminate\Http\Request;
use Session;
use Validator;
use DB;
use Carbon\Carbon;

class LottController extends KbvController
{

    public function index()
    {
        if (!$this->access())
            return redirect('/');
        $search = ["title" => ''];
        $search = ["name" => '', "area" => '', "number" => '', "title" => '', "lucky" => ''];
        $s      = session('search_lott');

        if ($s) {
            foreach ($s as $key => $value) {
                $search[$key] = $s[$key];
            }
        }

        $query  = KbvLucky::orderby('created_at', 'desc');
        $cities = City::where('country', 'VN')->get();

        if ($search['title']) {
            $query = $query->whereIn('lottery_id', function ($q) use ($search) {
                $q  =  $q->select('id')->from('kbv_lotteries');
                if ($search['title'])
                    $q  =  $q->where('title', 'like', '%' . $search['name'] . '%');
            });
        }
        if ($search['name'] || $search['area'] || $search['number']) {
            $query = $query->whereIn('member_id', function ($q) use ($search) {
                $q  =  $q->select('id')->from('members');
                if ($search['name'])
                    $q  =  $q->where('name', 'like', '%' . $search['name'] . '%');
                if ($search['area'])
                    $q  =  $q->where('area', $search['area']);
                if ($search['number'])
                    $q  =  $q->where('code', 'like', '%' . $search['number'] . '%');
            });
        }

        if ($search['lucky'])
            $query  =  $query->where('number', $search['lucky']);

        $query  = $query->paginate(6);

        $luckies  = $query->map(function ($lu) {

            $mem         = Member::find($lu->member_id);
            $lottery     = KbvLotteries::find($lu->lottery_id);

            if (!$lottery) return;

            $lu->name    = $mem->name;
            $lu->phone   = $mem->code;
            $lu->points  = $mem->redeempoint;
            $lu->area    = City::find($mem->area)['name'];

            $lu->title   = $lottery->title;
            $lu->end     = date('Y-m-d', strtotime($lottery->end_at));
            $lu->status  = $lottery->status;

            $end =  date('Y-m-d', strtotime($lottery->end_at));
            $today = Carbon::today();
            if ($end < $today || $lottery->result) {
                $lu->status   = 'close';
            }
            return $lu;
        });
        return view('.lott', compact('luckies', 'search', 'query', 'cities'));
    }
    //POST
    public  function search(Request $req)
    {

        session(['search_lott'  =>  [
            'name'      =>  $req->name,
            'area'      =>  $req->area,
            'number'    =>  $req->number,
            'title'     =>  $req->title,
            'lucky'     =>  $req->lucky,
        ]]);

        return redirect()->back();
    }
}
