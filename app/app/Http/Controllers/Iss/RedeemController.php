<?php namespace App\Http\Controllers\Iss;
use App\Http\Controllers\Controller;
use App\Save\RootIssuer as Save;

use App\Basic\Sys\User;
use App\Issuer;
use App\Issuer\Promotional;
use App\Issuer\PromotionPoint;

use Illuminate\Http\Request;
use Session;
use Validator;

class RedeemController extends Controller
{

    public function index()
    {
        $query       = PromotionPoint::Where('type','redeem')->paginate(16);
        $promotions  = $query->map(function($p){
            $p->title   = $p->promotion()->message()->title;
        });
        $r=[
          'header'=>'Redeem',
          'url.new'     =>url('redeem/new'),
          'url.search'  =>url('redeem/search'),
        ];
        return view('iss.promotion',compact('promotions','r'));
    }
    public function fresh()
    {
        $r  =  [
          'header'  =>  'Redeem',
          'action'  =>  url('redeem/add')];
        return view('iss.promotion.new',compact('r'));
    }

    public function detail( $id )
    {

    }

  ////POST////
    public function add(Request $req)
    {

    }

    public function edit(Request $req )
    {

    }

    public function del(Request $request)
    {

    }

}
