<?php namespace App\Http\Controllers;

use App\Http\Controllers\KbvController;

use App\Basic\Sys\Domain;

use App\Models\Kbv\KbvMission;
use App\Models\Kbv\KbvLucky;
use App\Models\Kbv\KbvLotteries;

use App\Basic\Media;

use Illuminate\Http\Request;
use Session;
use Validator;
use DB;
use Carbon\Carbon;

class LuckyController extends KbvController
{
    protected $langs = [
        'active'  => 'có',
        'deactive' => 'không',
        'used'    => 'đã dùng'
    ];

    public function index()
    {
        if (!$this->access())
            return redirect('/');
        $search = ["title" => ''];
        $s      = session('search_lotteries');

        if ($s) {
            foreach ($s as $key => $value) {
                $search[$key] = $s[$key];
            }
        }

        $query  = KbvLotteries::orderby('created_at', 'desc');

        if ($search['title']) {
            $query  = $query->where('title', 'like', '%' . $search['title'] . '%');
        }

        $query  = $query->paginate(6);

        $lotteries  = $query->map(function ($lo) {
            $end =  date('Y-m-d', strtotime($lo->end));
            $today = Carbon::today();
            if ($end < $today || $lo->result) {
                $lo->status   = 'close';
            }
            return $lo;
        });

        return view('.lucky', compact('lotteries', 'search', 'query'));
    }
    public function fresh()
    {
        $today = Carbon::now()->toDateString();
        return view('.lucky.new', compact('today'));
    }
    public function detail($id)
    {
        if (!$this->access())
            return redirect('/');
        $lottery  = kbvLotteries::find($id);
        $img      = $lottery->media_id ? Media::find($lottery->media_id)->source : url('images/portrait/medium/avatar-m-4.png');
        $lottery->media   = $img;
        return view('.lucky.detail', compact('lottery'));
    }


    //POST
    public function add(Request $req)
    {
        if (!$this->access())
            return redirect('/');
        $this->validate($req, [
            'title' => 'required|max:255',
            'point' => 'required',
            'end' => 'required',
        ]);

        $end =  date('Y-m-d', strtotime($req->end));

        $today = Carbon::today();
        if ($end < $today) {
            return redirect()->back()
                ->with(['flag' => 'failed', 'message' => 'Ngày xổ phải sau ngày hôm nay!']);
        }

        $lottery  = new kbvLotteries;
        $lottery->title         = $req->title;
        $lottery->redeempoint   = $req->point;
        $lottery->end_at        = $req->end;

        $lottery->save();


        if ($lottery->id) {
            return redirect(url('lucky/id/' . $lottery->id))
                ->with(['flag' => 'success', 'message' => 'Tạo mới thành công']);
        }
        return redirect()->back()
            ->with(['flag' => 'failed', 'message' => 'Tạo mới không thành công']);
    }

    public function action(Request $req)
    {
        $lucky = KbvLotteries::find($req->lucky_id);

        switch ($req->action) {
            case 'delete':
                $lucky->delete();
                return redirect()->back()
                    ->with([
                        'flag' => 'susscess',
                        'message' => 'Deleted'
                    ]);
                break;
            case 'lock':
                $lucky->status = 'deactive';
                $lucky->save();
                return redirect()->back()
                    ->with([
                        'flag' => 'susscess',
                        'message' => 'Finish'
                    ]);
                break;
            case 'unlock':
                $lucky->status = 'active';
                $lucky->save();
                return redirect()->back()
                    ->with([
                        'flag' => 'susscess',
                        'message' => 'Finish'
                    ]);
                break;
        }
    }

    public  function search(Request $req)
    {
        session(['search_lotteries'  =>  [
            'title'  =>  $req->title
        ]]);
        return redirect()->back();
    }

    public function save(Request $req)
    {

        $this->validate($req, [
            'title'   => 'required|max:255',
            'point'   => 'required',
        ]);

        $lottery = kbvLotteries::find($req->lottery_id);

        $lottery->title         = $req->title;
        $lottery->redeempoint   = $req->point;
        $lottery->content       = $req->sumary;
        $lottery->result        = $req->result;
        $lottery->end_at        = $req->end_at;


        if ($req->hasFile('media')) {

            $src    = $req->media;
            $name   = uniqid() . '.' . $src->getClientOriginalExtension();


            $src->move('upload', $name);



            $media          = new  Media;
            $media->source  = url('upload/' . $name);
            $media->type    = 'img';
            $media->user_id = $this->user()->id;

            $media->save();

            $lottery->media_id = $media->id;
        }

        $lottery->save();
        return redirect()->back()
            ->with(['flag' => 'success', 'message' => 'Lưu thành công']);
    }
}
