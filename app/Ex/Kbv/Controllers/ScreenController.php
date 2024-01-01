<?php namespace App\Ex\Kbv\Controllers;
use App\Ex\Kbv\Controllers\KbvController;
use App\Ex\Kbv\Model\KbvRelease;
use App\Ex\Kbv\Model\KbvMission;
use App\Ex\Kbv\Model\KbvLotteries;
use App\Ex\Kbv\Model\KbvLucky;
use App\Ex\Kbv\Model\KbvSetting;
use App\Ex\Kbv\Helper;

use App\Seed\Member;
use App\Basic\Sys\User;

use App\Issuer\Message;
use App\Issuer\Config;
use App\Issuer\Promotional;
use App\Issuer\PromotionCurrency;
use App\Issuer\MemberCurrency;
use App\Issuer\Currency;
use App\Issuer\Catalogue;

use App\Basic\Media;
use App\Basic\Sys\City;

use App\Seed\Transaction;

use Illuminate\Http\Request;
use Session;
use Validator;
use DB;
use Auth;
use Carbon\Carbon;
use Mail;
class ScreenController extends KbvController
{
    public function redeems(){
      /*
      if(!$this->mem()) return;
      $mem  = Member::find($this->mem()->id);
      if(!$mem){
          echo 'Bạn cần đăng nhập lại!';
          exit;
      }

      if($mem->status == 'deactive' ){
          echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
          exit;
      }
      */
        $query = Promotional::Where('type','redeem')
                  ->where('issuer_id',$this->is);

        $s     =  session('search');
        if($s){
            $query->whereIn('message_id', function($mess) use ( $s ){
                $mess->select('id')->from('messages')
                ->where('title','like','%'.$s['title'].'%');

            });
        }

        $query  = $query->paginate(4);

        $redeems   =  $query->map(function($p){
            $mess  =  $p->message();

            $p->title = $mess->title;
            $p->link  = url('redeem/id/'.$p->id);
            $p->img   = $mess->media_id ? Media::find($mess->media_id)->source :
                      url('images/portrait/medium/avatar-m-4.png');
            return $p;
        });
        $mem  = $this->mem();

        if($mem->ver > 0){
          return view('ex.kbv.screen.redeem',compact('redeems','query'));
        }
        else{
            return view('ex.kbv.screen.v1.redeem',compact('redeems','query'));
        }

        //return view('ex.kbv.screen.redeem',compact('redeems','query'));
    }

    public function redeemXuAdmin()
    {

        $query = Transaction::select("transactions.*", "members.phone", "member_currency.redeempoint", "bank_accounts.bank_name", "bank_accounts.bank_number", "bank_accounts.name")->Where([
            ['transactions.type', 'redeem'],
            ['transactions.issuer_id', $this->issuer()->id],
            ['transactions.status', "pending"],
        ])
        ->join('members','members.id','=','transactions.member_id')
        ->join('bank_accounts','members.id','=', 'bank_accounts.member_id')
        ->join('member_currency', 'member_currency.member_id','=', 'members.id' );

        $search     =  session('search_news');
        if ($search['phone']) {
            $query->where('phone', 'like', '%' . $search['phone'] . '%');
        }

        $trans  = $query->paginate(9);

        $r = [
            'header' => 'Đổi xu',
            'url.search'  => url('redeem-xu/action'),

        ];
        return view('ex.kbv.redeem-await', compact('r', 'trans', 'search'));
    }

    public function redeemXuAdminAction ( Request $req )
    {


        if ( $req->has('action') ) {
            $tran = Transaction::find($req->transaction_id);
            $tran->status = $req->action;
            $tran->save();
            if ($req->action == "active") {
                $mem = Member::find($req->member_id);
                $mem->withdrawxuWithoutTran($tran->out);

                $msg = "Chuyển khoản thành công";
                Helper::push($req->member_phone, $msg);
                return redirect()->back()
                    ->with([
                        'flag' => 'susscess',
                        'message' => $msg
                    ]);
            }
            if ($req->action == "inactive") {
                return redirect('/member/push/' . $req->member_id);
            }

        }

        $query = Transaction::select("transactions.*", "members.phone", "members.id AS member_id", "member_currency.redeempoint", "bank_accounts.bank_name", "bank_accounts.bank_number", "bank_accounts.name")->Where([
            ['transactions.type', 'redeem'],
            ['transactions.issuer_id', $this->issuer()->id],
            ['transactions.status', "pending"],
        ])
        ->join('members', 'members.id', '=', 'transactions.member_id')
        ->join('bank_accounts', 'members.id', '=', 'bank_accounts.member_id')
        ->join('member_currency', 'member_currency.member_id', '=', 'members.id');

        $search = "";
        if ($req->has('phone')) {
            $query->where('phone', 'like', '%' . $req->phone . '%');
            $search = $req->phone;
        }

        $trans  = $query->paginate(9);

        $r = [
            'header' => 'Đổi xu',
            'url.search'  => url('redeem-xu/action'),

        ];
        return view('ex.kbv.redeem-await', compact('r', 'trans', 'search'));
    }

    public function mission(){
        $scancode = [
                      'code'   =>  'scancode','html'=>'Input Serino',
                      'action'  =>  ['type'=>'scancode']
                    ];

        $luckyno  = [ 'code'   => 'luckyno',
                      'html'   => 'Hello Number',
                      'action' => ['type'=>'url',
                                  'link' => url('screen/mission/luckyno'),
                                  'para' => ['app_token','public','private']]
                    ];



        $data[]   =  $scancode;
        $data[]   =  $luckyno;
        print(json_encode($data));
    }


    public function reward(Request $req){
      $mem  = Member::find($this->mem()->id);
      if(!$mem){
          echo 'Bạn cần đăng nhập lại!';
          exit;
      }

      if($mem->status == 'deactive' ){
          echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
          exit;
      }
        if( $mem->name && $mem->email && $mem->address ){
            $redeem   = KbvMission::find($req->redeem);
            if(!$redeem){
                echo 'Chương trình đã dừng!';
                return;
            }



            $release  = KbvRelease::where('seri_no',$req->seri)->first();

            if($release){
                if($release->mem_id ==  $mem->id){
                  echo 'Bạn đã nhận thưởng rồi';
                }
                else{
                  echo 'Mã này đã nhận thưởng!';
                }
                return;
            }
            $release              =  new KbvRelease;
            $release->mem_id      =  $mem->id;
            $release->product_id  =  $redeem->product_id;
            $release->seri_no     =  $req->seri;
            $release->save();

            if($release->id){
              $mem  = Member::find($mem->id);
              $mem->reward($redeem->points,"Quét mã nhận thưởng: #".$release->seri_no);
              $mem->reward_xu($xu,"Quét mã nhận thưởng: #".$release->seri_no);

                // Save member currency
                $memCur = MemberCurrency::where([
                    ['member_id', $mem->id],
                    ['currency_id', 1]
                ])->first();

                if ( !$memCur ) {
                    $memCur = new MemberCurrency();
                    $memCur->accumulate = 0;
                }

              $message  = [
                "point" =>  $redeem->points,
                "xu"    =>  $redeem->xu,
                "total" =>  $mem->redeempoint,
                "totalxu" =>  $memCur->accumulate,
                "time"  =>  date('Y-m-d',strtotime($release->created_at))
              ];
              return view('ex.kbv.screen.message',compact('message'));
            }

        }

        return  $this->form();
    }


    public  function welcome(Request $req){
        $mem  = $this->mem();

        if(empty($mem)) $mem  = $this->reLogin($req);

        if(!$mem || $mem->status == 'deactive'){
            echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
            exit;
        }


        if( $mem->name && $mem->email && $mem->address && $mem->work ){

            return $this->news();
            // return $this->form();
        }

        return  $this->form();
    }


    public function history(){
        $mem  = Member::find($this->mem()->id);
        if(!$mem){
            echo 'Bạn cần đăng nhập lại!';
            exit;
        }

        if($mem->status == 'deactive' ){
            echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
            exit;
        }
        $query = Transaction::where('member_id', $mem->id)
          ->whereNull('currency_id')
          ->orderby('created_at', 'desc')->paginate(30);
        $rows  = $query->map(function ($row) {
          $row->c   =  'col-sm-4 pull-left text-xs-left  bg-primary white';
          $row->s   =  'col-sm-8 pull-right text-xs-right bg-teal white';

          if ($row->out) {
            $row->s   =  'col-sm-4 pull-left text-xs-left bg-primary white';
            $row->c   =  'col-sm-8 pull-right text-xs-right bg-teal white';
          }
          return $row;
        });
        return view('ex.kbv.screen.history',compact('query', 'rows'));
    }


    public function historyXu(){
        $mem  = Member::find($this->mem()->id);
        if(!$mem){
            echo 'Bạn cần đăng nhập lại!';
            exit;
        }

        if($mem->status == 'deactive' ){
            echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
            exit;
        }

        $mem->xu = 0;
        $memcur = MemberCurrency::where([
          ['currency_id', 1],
          ['member_id', $mem->id],
        ])->first();
        if ($memcur) {
          $mem->xu = $memcur->redeempoint;
        }

        $query = Transaction::where('member_id', $mem->id)->where('currency_id',1)
          ->orderby('created_at', 'desc')->paginate(30);
        $rows  = $query->map(function ($row) {
          $row->c   =  'col-sm-4 pull-left text-xs-left  bg-primary white';
          $row->s   =  'col-sm-8 pull-right text-xs-right bg-teal white';

          if ($row->out) {
            $row->s   =  'col-sm-4 pull-left text-xs-left bg-primary white';
            $row->c   =  'col-sm-8 pull-right text-xs-right bg-teal white';
          }
          return $row;
        });
        return view('ex.kbv.screen.historyXu',compact('query', 'rows','mem'));
    }

    public function trans(){
        $mem  = Member::find($this->mem()->id);
        if(!$mem){
            echo 'Bạn cần đăng nhập lại!';
            exit;
        }

        if($mem->status == 'deactive' ){
            echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
            exit;
        }


        $query = Transaction::where('member_id',$mem->id)
                    ->orderby('created_at','desc')->paginate(30);
        $rows  = $query->map(function($row){
            $row->c   =  'col-md-4 pull-left text-xs-left  bg-primary white';
            $row->s   =  'col-md-8 pull-right text-xs-right bg-teal white';

            if($row->out){
              $row->s   =  'col-md-8 pull-left text-xs-left bg-primary white';
              $row->c   =  'col-md-4 pull-right text-xs-right bg-teal white';
            }
            return $row;
        });
        return view('ex.kbv.screen.transaction',compact('query','rows'));
    }

    public function policy(){
        return view('ex.kbv.screen.page');
    }
    public function contact(){
      $mem  = Member::find($this->mem()->id);

      $email  = $mem ? $mem->email : '';
      return view('ex.kbv.screen.contact',compact('email'));
    }
    public function info(){
      $mem  = Member::find($this->mem()->id);
      if(!$mem){
          echo 'Bạn cần đăng nhập lại!';
          exit;
      }

      if($mem->status == 'deactive' ){
          echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
          exit;
      }
        return $this->form('info');
    }

    public function messenger(Request $req){

    }

//POST

    public function send(Request $req){
      $input = $req->all();

      Mail::send('ex.kbv.screen.mail',
        array(
        'email'=>$input["email"],
        'title'=>$input["topic"],
        'content'=>$input['info']),
        function($message){
                //info@kbvision.vn
      	        $message->to('info@kbvision.vn', 'Phản hồi từ App')->subject('Phản hồi từ App');
      	    });

      return redirect()->back()
      ->with(['flag'=>'success','message'=>'Chúng tôi đã nhận được phản hồi của bạn!']);
    }

    public function update(Request $req){

      $this->validate($req,[
            'name'    => 'required|max:255',
            'address' => 'required|max:255',
            'email'   => 'required',
        ]);
        $mem            = Member::find($req->mem_id);

        if ($req->phone_ref) {
            $phone_ref = $req->phone_ref;
            $indexOf = stripos($phone_ref, "0");
            if ($indexOf === 0) {
                $phone_ref = substr_replace($phone_ref, "84", 0, 1);
            }
            $memCheck = Member::where('phone', $phone_ref)->first();
            if ( !$memCheck ) {
                return redirect()->back()
                    ->with(['flag' => 'error', 'message' => 'Số điện thoại không tồn tại, Vui lòng nhập số khác']);
            }
            $config = Config::where('issuer_id' , 1)->first();
            if ($mem->phone_ref == null && $mem->phone_ref !== $req->phone_ref)
                $memCheck->reward($config->presenter_point, "Giới thiệu người dùng mới #" . $req->mem_id);
        }

        $bday           = date('Y-m-d H:i:s',strtotime($req->birthday.' 00:00:11'));

        $mem->name      = $req->name;
        $mem->address   = $req->address;
        $mem->email     = $req->email;
        $mem->area      = $req->cities;
        $mem->work      = $req->work;
        $mem->job       = $req->job;
        if ($req->phone_ref) {
            if ($mem->phone_ref == null && $mem->phone_ref !== $req->phone_ref)
                $mem->reward($config->presentee_point, "Được giới thiệu bởi #" . $memCheck->id);
            $mem->phone_ref       = $phone_ref;
        }
        $mem->birthday  = $bday;//date('Y-m-d',strtotime($req->birthday));


        $mem->save();

        $this->memSet($mem);

        return redirect()->back()
        ->with(['flag'=>'success','message'=>'Cập nhật thành công']);

    }

    public function game(){
        $game       = KbvSetting::byCode('lock.screen.game');

        $lock       = $game ? $game->content : 'false';

        $query      = KbvLotteries::where('status','active')->paginate(6);
        $lotteries  =  $query->map(function($p){
            $p->link  = url('screen/game/id/'.$p->id);
            $p->img   = $p->media_id ? Media::find($p->media_id)->source :
                      url('images/portrait/medium/avatar-m-4.png');
            return $p;
        });
        $mem  = $this->mem();

        if($mem->ver > 0){
            return view('ex.kbv.screen.game',compact('lotteries','query','lock'));
        }
        else{
            return view('ex.kbv.screen.v1.game',compact('lotteries','query','lock'));
        }

        //return view('ex.kbv.screen.game',compact('lotteries','query','lock'));
    }

    public function lottery($id){
        $mem  = Member::find($this->mem()->id);
        if(!$mem){
            echo 'Bạn cần đăng nhập lại!';
            exit;
        }

        if($mem->status == 'deactive' ){
            echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
            exit;
        }

        $lottery     = KbvLotteries::find($id);

        if(!$lottery) return;

        $lucky          = KbvLucky::where('lottery_id',$lottery->id)
                          ->where('member_id',$mem->id)->first();

        $lottery->img   =   $lottery->media_id ? Media::find($lottery->media_id)->source :
                  url('images/portrait/medium/avatar-m-4.png');

        $lottery->need  =   $lottery->redeempoint - $mem->redeempoint;

        $end =  date('Y-m-d',strtotime($lottery->end_at));
        $today = Carbon::today();

        if( $end <$today || $lottery->result ) {
            $lottery->status   = 'close';
        }

        return view('ex.kbv.screen.lottery',compact('lottery','lucky'));
    }

    public function lucky(Request $req){
        $mem  = Member::find($this->mem()->id);
        if(!$mem){
            echo 'Bạn cần đăng nhập lại!';
            exit;
        }

        if($mem->status == 'deactive' ){
            echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
            exit;
        }
        $lottery      = KbvLotteries::find($req->lottery_id);
        if( !$lottery) return;

        $need  =   $lottery->redeempoint - $mem->redeempoint;

        if($need>0) return;

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
        $number = 1;
        $str    = KbvLucky::where('lottery_id',$lottery->id)
                  ->orderby('id','desc')->first();

        if(isset($str)){
            try {
                $number = (int)$str->number;
            } catch (Exception $e) {
                $number = 1;
            }
        }

        DB::beginTransaction();



          $number =  $this->rank($lottery->id, $number);

          $lucky              = new KbvLucky;
          $lucky->number      = $number;
          $lucky->member_id   = $mem->id;
          $lucky->lottery_id  = $lottery->id;
          $lucky->save();
          if($lucky->id){
            $mem->withdraw($lottery->redeempoint,'Tham gia quay số trả thưởng#'.$lottery->id);
            $str   =  (string)$number;
            $index = 5 - strlen($str);

            $show  = substr_replace('00000',$str,$index);

            session(['lottery_memssage'  => 'Số may mắn : #'. $show]);

            DB::commit();

            return redirect()->back()
              ->with(['flag'=>'success','message'=>'Số may mắn : #'. $show ]);
          }
          DB::rollback();

          return redirect()->back()
            ->with(['failed','message'=>'Lấy số không thành công!']);
    }

    public function luckies(Request $req){
        $mem  = Member::find($this->mem()->id);
        if(!$mem){
            echo 'Bạn cần đăng nhập lại!';
            exit;
        }

        if($mem->status == 'deactive' ){
            echo 'Tài khoản bạn đã khóa. Vui lòng liên hệ quản trị viên.';
            exit;
        }

        $query     = KbvLucky::where('member_id',$mem->id)->orderby('created_at','desc')->paginate(4);


        $luckies   = $query->map(function($luc){
            $str   =  (string)$luc->number;
            $index = 5 - strlen($str);

            $luc->show   = substr_replace('00000',$str,$index);




            $lottery      = KbvLotteries::find($luc->lottery_id);

            if( !$lottery) return $luc;



            $luc->end_at  = $lottery->end_at;
            $luc->result  = $lottery->result;

            $luc->status  = $lottery->status;

            $end =  date('Y-m-d',strtotime($lottery->end_at));
            $today = Carbon::today();
            if( $end <$today || $lottery->result ) {
                $luc->status   = 'close';
            }

            return $luc;
        });
        return view('ex.kbv.screen.luckies',compact('luckies','query'));
    }

    public function act(){
      $query    = KbvRelease::where('mem_id',$this->mem()->id)->paginate(9);

      $release  =$query->map(function($p){
          $mission    = KbvMission::where('product_id',$p->product_id)->first();
          if(!$mission) return;
          $p->points  = $mission->points;
          return $p;
      });
      $mem=$this->mem();

      if($mem->ver > 0){
          return view('ex.kbv.screen.act',compact('release','query'));
      }
      else{
          return view('ex.kbv.screen.v1.act',compact('release','query'));
      }

      //return view('ex.kbv.screen.act',compact('release','query'));
    }

    public function catalog(){
        $query = Catalogue::where('issuer_id', 1)
        ->orderBy('created_at', 'desc')
        ->first();
        print_r($query->link);

    }
    public function cata(){
        $query = Catalogue::where('issuer_id', 1)
        ->orderBy('created_at', 'desc')
        ->first();
        $catalog = $query->link;
        return view('ex.kbv.screen.catalog',compact('catalog'));
    }

    function ran($lottery, $number ){

        $check  = KbvLucky::where('lottery_id',$lottery)
                  ->where('number',$number)->first();
        if( $check ){
            $number = substr((string)rand(1000000,100000000),1);
            $this->ran($lottery, $number);
        }
        return $number;
    }

    function rank($lottery, $number){
        if( $number > 99999)
            return;
        $check  = KbvLucky::where('lottery_id',$lottery)
                  ->where('number',$number)->first();
        if( $check ){
            $number ++ ;
            $this->rank($lottery, $number);
        }
        return $number;
    }

    function news(){
        $query = Message::Where('type','news')
                  ->where('issuer_id',$this->is)->orderBy('hot', 'desc')
                  ->orderBy('created_at','desc');
        $query  = $query->paginate(9);
        $news   = $query->map(function($p){
            $p->link  = url('news/id/'.$p->id);
            $p->img   = $p->media_id ? Media::find($p->media_id)->source :
                      url('images/portrait/medium/avatar-m-4.png');
            return $p;
        });
        if($query->currentPage() > 1) {
            return view('ex.kbv.screen.news_card',compact('news','query'));
        }
        return view('ex.kbv.screen.news',compact('news','query'));
    }

    function home(Request $req){
      $mem  = $this->mem();

      if(empty($mem->id)){
          echo "Tài khoản của bạn đã khóa. Vui lòng liên hệ quản trị viên.";
          return;
      }

      if(empty($mem->name) || empty($mem->email) || empty($mem->address) || empty($mem->work))
        return  $this->form();


          $query = Message::Where('type','news')
                    ->where('issuer_id',$this->is)->orderBy('hot', 'desc')
                    ->orderBy('created_at','desc');
          $query  = $query->paginate(9);
          $news   = $query->map(function($p){
              $p->link  = url('news/id/'.$p->id);
              $p->img   = $p->media_id ? Media::find($p->media_id)->source :
                        url('images/portrait/medium/avatar-m-4.png');
              return $p;
          });
          if($query->currentPage() > 1) {
              return view('ex.kbv.screen.news_card',compact('news','query'));
          }

          return view('ex.kbv.screen.home',compact('news','query'));
    }

    function ext(){
        return view('ex.kbv.screen.menu');
    }

    function detail($id){
        $mem  = $this->mem();
        $news = Message::find($id);
        $news->img   = $news->media_id ? Media::find($news->media_id)->source :
                  url('images/portrait/medium/avatar-m-4.png');

        if($mem->ver > 0){
            return view('ex.kbv.screen.detail',compact('news'));
        } else{
            return view('ex.kbv.screen.v1.detail',compact('news'));
        }

    }

    function form( $show = 'register'){
        $mem    = Member::find($this->mem()->id);

        $cities = City::where('country','VN')->get();
        $view   ='ex.kbv.screen.'.$show;

        $mday   = Carbon::now()->subYears(17);
        $mday   = $mday->toDateString();

        $setting  = KbvSetting::byCode('lock.info.area')->content;

        $locks    = [
            'area'  =>  $show = 'info' ? $setting : 'false'
        ];

        return  view($view,compact('cities','mem','mday','locks'));
    }

    function reLogin(Request $req){
        $u  = User::where('public',$req->public)
              ->where('password',$req->private)->first();
        if($u){
            $mem  = Member::where('user_id',$u->id)->first();
            $mem->private = $u->password;
      			$mem->public  = $u->public;
            $this->memSet($mem);
            return $mem;
        }
    }

}
