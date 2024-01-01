<?php namespace App\Ex\Kbv\Controllers;
use App\Ex\Kbv\Controllers\KbvController;

use App\Basic\Sys\Domain;

use App\Ex\Kbv\Model\KbvMission;


use App\Issuer\Message;
use App\Issuer\Promotional;
use App\Issuer\Mission;
use App\Issuer\PromotionMission;
use App\Issuer\PromotionCurrency;

use App\Issuer\PromotionPoint;
use App\Ex\Kbv\Helper;

use Illuminate\Http\Request;
use Session;
use Validator;
use DB;
class MissionController extends KbvController
{
    protected $langs = [
      'active'  =>'có',
      'deactive'=>'không',
      'used'    =>'đã dùng'
    ];

    public function index(){
        if( !$this->access())
          return redirect('/');
        $search      = $this->search();
        $query       = KbvMission::paginate(6);


        if($search['name']){
            $word  =  $search['name'];
            $terms = explode(" ",$word);

            $query = KbvMission::where('product_name',$word)
            ->orWhere(function ($query) use ($terms) {
               foreach ($terms as $term) {
                   $query->where('product_name', 'like', '%' . $term . '%');
               }
           })->paginate(6);
        }

        $missions    = $query->map(function($m){
              $m->pr_status     = $this->langs[ $m->status ];

              // $currency         = PromotionCurrency::where([
              //   ['mission_id', $m->id],
              //   ['currency_id', 1]
              // ])->first();
              // $m->xu            = $currency ? $currency->currency_number : 0;
              $m->xu = $m->xu ? $m->xu : 0;

              $p                = KbvMission::productBy($m->product_id);

              if(empty($p->Oid)) return $m;
              $m->product_id    = $p->Oid;
              $m->product_code  = $p->PRODUCT_CODE;
              $m->product_name  = $p->PRODUCT_NAME;
              $m->barcode       = $p->BARCODE;
              return $m;
          });

        return view('ex.kbv.mission',compact('missions','search','query'));
    }

    public function fresh(){
        if( !$this->access())
          return redirect('/');
        return $this->missions();
    }

    public function go(){
        $r=[
          'header'  =>'Scan Code',
          'action'  => url('mission/go/scancode')
        ];
        $secret = $this->secret;
        return view('ex.kbv.mission.scancode',compact('r','secret'));
    }

    public function mission_detail($id){
        $serials  = KbvMission::serialsBy($id);

        //print_r(KbvMission::ser()); exit;

        return view('ex.kbv.mission.serials',compact('serials'));
    }

    public function mission_scancode(Request $req){
        $this->validate($req,[
            'app_token' => 'required',
        ]);

        $seri = $req->code;
        if($req->app_token != $this->secret ) return;

        /*
        $ar   = explode(':',$seri);

        if(isset($ar[1])){
            $seri =  substr($ar[1],0,13);
            echo $seri;exit;
        }
        */

        $p    = KbvMission::redeem( $seri );

        if(!$p) {
          echo 'Không tìm thấy thông tin sản phẩm';
          return;
        }
        $product  = KbvMission::productBy($p->PRODUCT_ID);
        $redeem   = KbvMission::find_id($p->PRODUCT_ID);
        if(!$redeem) {
          echo 'Chương trình không áp dụng cho sản phẩm này';
          return;
        }
        // $currency         = PromotionCurrency::where([
        //   ['mission_id', $redeem ->id],
        //   ['currency_id', 1]
        // ])->first();
        // $redeem->xu  = $currency ? $currency->currency_number : 0;

        //$points  = $redeem->points;

        return view('ex.kbv.mission.redeem',compact('seri','product','redeem'));
    }

    public function reward(Request $req){
        $this->validate($req,[
            'app_token' => 'required',
        ]);

        $seri = $req->code;
        if($req->app_token != $this->secret ) return;

        $p    = KbvMission::redeem( $seri );

        if(!$p) {
          echo 'Không tìm thấy thông tin sản phẩm';
          return;
        }
        $product  = KbvMission::productBy($p->PRODUCT_ID);
        $redeem   = KbvMission::find_id($p->PRODUCT_ID);
        if(!$redeem) {
          echo 'Chương trình không áp dụng cho sản phẩm này';
          return;
        }

        // $currency = PromotionCurrency::where([
        //   ['mission_id', $redeem->id],
        //   ['currency_id', 1]
        // ])->first();
        // $redeem->xu = $currency->currency_number;

        $points  = $redeem->points;

        return view('ex.kbv.mission.redeem',compact('seri','product','redeem'));
    }

//POST//
    public function mission_action(Request $req){

        $sn = KbvMission::find_id($req->product_id);
        switch ($req->action) {
          case 'save':
              $this->mission_save($sn,$req);
              return redirect()->back()
              ->with([
                'flag'=>'susscess',
                'message'=>'Saved'
              ]);
            break;
          case 'cancel':
              if($sn) $sn->forceDelete();
              return redirect()->back()
              ->with([
                'flag'=>'susscess',
                'message'=>'Deleted'
              ]);
            break;
        }
    }

    public function mission_search(Request $req){
          session(['search_mission'  =>  [
            'name'  =>  $req->name,
            'code'  =>  $req->code
          ]]);

        return redirect()->back();
    }
//private...

    function currency_save( $sn, $req )
    {
        $misCurrency = PromotionCurrency::where([
          ['mission_id', $sn->id],
          ['currency_id', 1],
        ])->first();

        if ( !$misCurrency ) {
          $misCurrency = new PromotionCurrency;
        }

        $misCurrency->currency_id = 1;
        $misCurrency->mission_id = $sn->id;
        $misCurrency->currency_number = $req->xu;
        $misCurrency->save();
    }

    function mission_save($sn,$req){
        if($sn){
            $sn->points           = $req->redeem;
            $sn->product_name     = $req->product_name;
            $sn->xu               = $req->xu;
            $sn->save();
            $this->currency_save($sn,$req);
            return;
        }
        $sn                   = new KbvMission;
        $sn->product_id       = $req->product_id;
        $sn->product_name     = $req->product_name;
        $sn->points           = $req->redeem;
        $sn->xu               = $req->xu;
        $sn->save();
        $this->currency_save($sn,$req);
    }

    function missions()
    {
        $search     = $this->search();
        $missions   = array_map(function($p){
            $p->pr_status = $this->langs[ $p->status ];
            return $p;
        },KbvMission::missions($search));
        return view('ex.kbv.mission.new',compact('missions','search'));
    }


    function search(){
        return session('search_mission') ? session('search_mission') : [
          'name'  =>  '',
          'code'  =>  ''
        ];
    }


    function freshMission( $promotion ){
        $mission              = new Mission;
        $mission->title       = $promotion->title;
        $mission->code        = $promotion->code;
        $mission->issuer_id   = $promotion->issuer_id;
        $mission->link        = url('mission/a/input');
    }

    function path(){
        return app_path().'/Ex//'.$this->user()->public;
    }


}
