<?php namespace App\Http\Controllers;

use App\Http\Controllers\KbvController;
use App\Models\Kbv\KbvRelease;
use App\Models\Kbv\KbvMission;
use App\Models\Kbv\KbvLotteries;
use App\Models\Kbv\KbvLucky;
use App\Models\Kbv\KbvSetting;

use App\Models\Seed\Member;
use App\Models\Basic\Sys\User;

use App\Models\Issuer\Message;
use App\Models\Issuer\Promotional;

use App\Models\Basic\Media;
use App\Models\Basic\Sys\City;

use App\Models\Seed\Transaction;

use Illuminate\Http\Request;
use Session;
use Validator;
use DB;
use Auth;
use Carbon\Carbon;
use Mail;

class ScreenController extends KbvController
{
    public function redeems()
    {
        $mem  = Member::find($this->mem()->id);
        if (!$mem) {
            echo 'Bạn cần đăng nhập lại!';
            exit;
        }

        if ($mem->status == 'deactive') {
            echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
            exit;
        }

        $query = Promotional::Where('type', 'redeem')
            ->where('issuer_id', $this->is);

        $s     =  session('search');
        if ($s) {
            $query->whereIn('message_id', function ($mess) use ($s) {
                $mess->select('id')->from('messages')
                    ->where('title', 'like', '%' . $s['title'] . '%');
            });
        }

        $query  = $query->paginate(6);

        $redeems   =  $query->map(function ($p) {
            $mess  =  $p->message();

            $p->title = $mess->title;
            $p->link  = url('redeem/id/' . $p->id);
            $p->img   = $mess->media_id ? Media::find($mess->media_id)->source : url('images/portrait/medium/avatar-m-4.png');
            return $p;
        });

        return view('.screen.redeem', compact('redeems', 'query'));
    }

    public function mission()
    {
        $scancode = [
            'code'   =>  'scancode', 'html' => 'Input Serino',
            'action'  =>  ['type' => 'scancode']
        ];

        $luckyno  = [
            'code'   => 'luckyno',
            'html'   => 'Hello Number',
            'action' => [
                'type' => 'url',
                'link' => url('screen/mission/luckyno'),
                'para' => ['app_token', 'public', 'private']
            ]
        ];



        $data[]   =  $scancode;
        $data[]   =  $luckyno;
        print(json_encode($data));
    }


    public function reward(Request $req)
    {
        $mem  = Member::find($this->mem()->id);
        if (!$mem) {
            echo 'Bạn cần đăng nhập lại!';
            exit;
        }

        if ($mem->status == 'deactive') {
            echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
            exit;
        }
        if ($mem->name && $mem->email && $mem->address) {
            $redeem   = KbvMission::find($req->redeem);
            if (!$redeem) {
                echo 'Chương trình đã dừng!';
                return;
            }

            $release  = KbvRelease::where('seri_no', $req->seri)->first();

            if ($release) {
                if ($release->mem_id ==  $mem->id) {
                    echo 'Bạn đã nhận thưởng rồi';
                } else {
                    echo 'Mã này đã nhận thưởng!';
                }
                return;
            }
            $release              =  new KbvRelease;
            $release->mem_id      =  $mem->id;
            $release->product_id  =  $redeem->product_id;
            $release->seri_no     =  $req->seri;
            $release->save();

            if ($release->id) {
                $mem  = Member::find($mem->id);
                $mem->reward($redeem->points, "Quét mã nhận thưởng: #" . $release->seri_no);
                $message  = [
                    "point" =>  $redeem->points,
                    "total" =>  $mem->redeempoint,
                    "time"  =>  date('Y-m-d', strtotime($release->created_at))
                ];
                return view('.screen.message', compact('message'));
            }
        }

        return  $this->form();
    }


    public  function welcome(Request $req)
    {

        if ($this->secret != $req->app_token)
            return;

        $u  = User::where('public', $req->public)
            ->where('password', $req->private)->first();

        if ($u) {
            $mem  = Member::where('user_id', $u->id)->first();
            $this->memSet($mem);
        } else {

            $mem  = Member::find($this->mem()->id);
        }

        if (!$mem) {
            echo 'Bạn cần đăng nhập lại!';
            exit;
        }

        if ($mem->status == 'deactive') {
            echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
            exit;
        }

        if ($mem->name && $mem->email && $mem->address && $mem->work) {
            return $this->news();
        }

        return  $this->form();
    }


    public function history()
    {
        $mem  = Member::find($this->mem()->id);
        if (!$mem) {
            echo 'Bạn cần đăng nhập lại!';
            exit;
        }

        if ($mem->status == 'deactive') {
            echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
            exit;
        }
        $trans  = Transaction::where('member_id', $mem->id)
            ->orderby('created_at', 'desc')->paginate(6);
        return view('.screen.history', compact('trans'));
    }

    public function policy()
    {
        return view('.screen.page');
    }
    public function contact()
    {
        $mem  = Member::find($this->mem()->id);

        $email  = $mem ? $mem->email : '';
        return view('.screen.contact', compact('email'));
    }
    public function info()
    {
        $mem  = Member::find($this->mem()->id);
        if (!$mem) {
            echo 'Bạn cần đăng nhập lại!';
            exit;
        }

        if ($mem->status == 'deactive') {
            echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
            exit;
        }
        return $this->form('info');
    }

    public function messenger(Request $req)
    { }

    //POST

    public function send(Request $req)
    {
        $input = $req->all();

        Mail::send(
            '.screen.mail',
            array(
                'email' => $input["email"],
                'title' => $input["topic"],
                'content' => $input['info']
            ),
            function ($message) {
                //info@kbvision.vn
                $message->to('info@kbvision.vn', 'Phản hồi từ App')->subject('Phản hồi từ App');
            }
        );

        return redirect()->back()
            ->with(['flag' => 'success', 'message' => 'Chúng tôi đã nhận được phản hồi của bạn!']);
    }

    public function update(Request $req)
    {

        $this->validate($req, [
            'name'    => 'required|max:255',
            'address' => 'required|max:255',
            'email'   => 'required',
        ]);

        $bday           = date('Y-m-d H:i:s', strtotime($req->birthday . ' 00:00:11'));



        $mem            = Member::find($req->mem_id);
        $mem->name      = $req->name;
        $mem->address   = $req->address;
        $mem->email     = $req->email;
        $mem->area      = $req->cities;
        $mem->work      = $req->work;
        $mem->job       = $req->job;
        $mem->birthday  = $bday; //date('Y-m-d',strtotime($req->birthday));


        $mem->save();

        $this->memSet($mem);

        return redirect()->back()
            ->with(['flag' => 'success', 'message' => 'Cập nhật thành công']);
    }

    public function game()
    {
        $game       = KbvSetting::byCode('lock.screen.game');

        $lock       = $game ? $game->content : 'false';

        $query      = KbvLotteries::where('status', 'active')->paginate(6);
        $lotteries  =  $query->map(function ($p) {
            $p->link  = url('screen/game/id/' . $p->id);
            $p->img   = $p->media_id ? Media::find($p->media_id)->source : url('images/portrait/medium/avatar-m-4.png');
            return $p;
        });
        return view('.screen.game', compact('lotteries', 'query', 'lock'));
    }

    public function lottery($id)
    {
        $mem  = Member::find($this->mem()->id);
        if (!$mem) {
            echo 'Bạn cần đăng nhập lại!';
            exit;
        }

        if ($mem->status == 'deactive') {
            echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
            exit;
        }

        $lottery     = KbvLotteries::find($id);

        if (!$lottery) return;

        $lucky          = KbvLucky::where('lottery_id', $lottery->id)
            ->where('member_id', $mem->id)->first();

        $lottery->img   = $lottery->media_id ? Media::find($lottery->media_id)->source : url('images/portrait/medium/avatar-m-4.png');

        $lottery->need  = $lottery->redeempoint - $mem->redeempoint;

        $end =  date('Y-m-d', strtotime($lottery->end_at));
        $today = Carbon::today();

        if ($end < $today || $lottery->result) {
            $lottery->status   = 'close';
        }

        return view('.screen.lottery', compact('lottery', 'lucky'));
    }

    public function lucky(Request $req)
    {
        $mem  = Member::find($this->mem()->id);
        if (!$mem) {
            echo 'Bạn cần đăng nhập lại!';
            exit;
        }

        if ($mem->status == 'deactive') {
            echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
            exit;
        }
        $lottery      = KbvLotteries::find($req->lottery_id);
        if (!$lottery) return;
        /*
        $number        = KbvLucky::where('lottery_id',$lottery->id)
                        ->where('member_id',$mem->id)->first();
        if($number)
          return redirect()->back()
          ->with(['flag'=>'failed','message'=>'Bạn đã lấy số']);
*/
        // Random lấy số ngẫu nhiên
        //$number = $this->ran($lottery->id,substr((string)rand(1000000,9999999),1));

        //Lấy số theo thức tự

        $str    = KbvLucky::where('lottery_id', $lottery)
            ->where('number', $number)->orderby('id', 'desc')->first();
        $number = 0;
        if (isset($str)) {
            try {
                $number = (int)$str;
            } catch (Exception $e) {
                $number = 0;
            }
        }

        DB::beginTransaction();
        $number =  $this->rank($lottery, $number);

        $lucky              = new KbvLucky;
        $lucky->number      = $number;
        $lucky->member_id   = $mem->id;
        $lucky->lottery_id  = $lottery->id;
        $lucky->save();
        if ($lucky->id) {
            $mem->withdraw($lottery->redeempoint, 'Tham gia quay số trả thưởng#' . $lottery->id);
            $str   =  (string)$number;
            $index = 5 - strlen($str);

            $show  = substr_replace('00000', $str, $index);

            session(['lottery_memssage'  => 'Số may mắn : #' . $show]);

            DB::commit();

            return redirect()->back()
                ->with(['flag' => 'success', 'message' => 'Số may mắn : #' . $show]);
        }
        DB::rollback();

        return redirect()->back()
            ->with(['failed', 'message' => 'Lấy số không thành công!']);
    }

    public function luckies(Request $req)
    {
        $mem  = Member::find($this->mem()->id);
        if (!$mem) {
            echo 'Bạn cần đăng nhập lại!';
            exit;
        }

        if ($mem->status == 'deactive') {
            echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
            exit;
        }

        $query     = KbvLucky::where('member_id', $mem->id)->orderby('created_at', 'desc')->paginate(6);


        $luckies   = $query->map(function ($luc) {
            $lottery      = KbvLotteries::find($luc->lottery_id);

            if (!$lottery) return $luc;

            $luc->end_at  = $lottery->end_at;
            $luc->result  = $lottery->result;

            $luc->status  = $lottery->status;

            $end =  date('Y-m-d', strtotime($lottery->end_at));
            $today = Carbon::today();
            if ($end < $today || $lottery->result) {
                $luc->status   = 'close';
            }

            return $luc;
        });
        return view('.screen.luckies', compact('luckies', 'query'));
    }

    public function act()
    {
        $query    = KbvRelease::where('mem_id', $this->mem()->id)->paginate(9);

        $release  = $query->map(function ($p) {
            $mission    = KbvMission::where('product_id', $p->product_id)->first();
            if (!$mission) return;
            $p->points  = $mission->points;
            return $p;
        });
        return view('.screen.act', compact('release', 'query'));
    }

    function ran($lottery, $number)
    {

        $check  = KbvLucky::where('lottery_id', $lottery)
            ->where('number', $number)->first();
        if ($check) {
            $number = substr((string)rand(1000000, 100000000), 1);
            $this->ran($lottery, $number);
        }
        return $number;
    }

    function rank($lottery, $number)
    {
        if ($number > 99999)
            return;
        $check  = KbvLucky::where('lottery_id', $lottery)
            ->where('number', $number)->first();
        if ($check) {
            $number++;
            $this->ran($lottery, $number);
        }
        return $number;
    }
    function news()
    {

        $query = Message::Where('type', 'news')
            ->where('issuer_id', $this->is)->orderBy('hot', 'desc')
            ->orderBy('created_at', 'desc');
        $query  = $query->paginate(9);
        $news   = $query->map(function ($p) {
            $p->link  = url('news/id/' . $p->id);
            $p->img   = $p->media_id ? Media::find($p->media_id)->source : url('images/portrait/medium/avatar-m-4.png');
            return $p;
        });
        return view('.screen.news', compact('news', 'query'));
    }

    function detail($id)
    {
        $news = Message::find($id);
        $news->img   = $news->media_id ? Media::find($news->media_id)->source : url('images/portrait/medium/avatar-m-4.png');
        return view('.screen.detail', compact('news'));
    }

    function form($show = 'register')
    {
        $mem    = Member::find($this->mem()->id);

        $cities = City::where('country', 'VN')->get();
        $view   = '.screen.' . $show;

        $mday   = Carbon::now()->subYears(17);
        $mday   = $mday->toDateString();

        $setting  = KbvSetting::byCode('lock.info.area')->content;

        $locks    = [
            'area'  =>  $show = 'info' ? $setting : 'false'
        ];

        return  view($view, compact('cities', 'mem', 'mday', 'locks'));
    }
}
