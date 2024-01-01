<?php namespace App\Ex\Kbv\Controllers;
use App\Ex\Kbv\Controllers\KbvController;
use App\Issuer\Message;
use App\Issuer\Promotional;
use App\Basic\Media;

use Illuminate\Http\Request;
use Session;
use Validator;
use DB;

class RedeemController extends KbvController{

    public function index(){
        if( !$this->access())
          return redirect('/');
        return $this->redeems();
    }
    public function fresh(){
        if( !$this->access())
          return redirect('/');
        return view('ex.kbv.redeem.new');
    }

    public function detail( $id )
    {
        if( !$this->access())
          return redirect('/');
        $redeem = Promotional::find($id);
        $mess   = $redeem->message();

        $img    = $mess->media_id ? Media::find($mess->media_id)->source :
                  url('images/portrait/medium/avatar-m-4.png');

        $redeem->sumary = $mess->content;
        $redeem->title  = $mess->title;
        $redeem->media  = $img ;
        return view('ex.kbv.redeem.detail',compact('redeem'));
    }

    //POST
    public function add(  Request $req  ){
        if( !$this->access())
            return redirect('/');
        $this->validate($req,[
            'title' => 'required|max:255',
            'point' => 'required|numeric'
        ]);

        $redeem = $this->do_add($req);
        if($redeem->id){
          return redirect(url('redeem/id/'.$redeem->id))
          ->with(['flag'=>'success','message'=>'Tạo mới thành công']);
        }
        return redirect()->back()
        ->with(['flag'=>'failed','message'=>'Tạo mới không thành công']);
    }

    public function save( Request $req ){
        $this->validate($req,[
            'title' => 'required|max:255',
            'point' => 'required|numeric'
        ]);
        $redeem = Promotional::find($req->redeem_id);
        $mess   = $redeem->message();

        $mess->title    = $req->title;
        $mess->status   = 'active';
        $mess->content  = $req->sumary;

        $redeem->point  = $req->point;

        if($req->hasFile('media')){
            $src    = $req->media;
            $name   = uniqid().'.'.$src->getClientOriginalExtension();
            $src->move('upload',$name);

            $media          = new  Media;
            $media->source  = url('upload/'.$name);
            $media->type    = 'img';
            $media->user_id = $this->user()->id;

            $media->save();

            $mess->media_id = $media->id;
        }

        $mess->save();
        $redeem->save();

        return redirect()->back()
        ->with(['flag'=>'success','message'=>'Lưu thành công']);
    }

    public function search(Request $req )
    {
        session('search_redeem', ['title'=>$req->title]);
        return redirect()->back();
    }

    public function action(Request $req){
      $redeem = Promotional::find($req->redeem_id);

      switch ($req->action) {
        case 'delete':
            $mess = Message::find($redeem->message_id);

            $redeem->delete();
            $mess->delete();
            return redirect()->back()
            ->with([
              'flag'=>'susscess',
              'message'=>'Deleted'
            ]);
          break;
      }
    }
//private...

    function redeems(){

        $query = Promotional::Where('type','redeem')
                  ->where('issuer_id',$this->issuer()->id);

        $search     =  session('search_news');
          if($search['title']){
                  $query->where('title','like','%'.$search['title'].'%');
            }
        if($search){
            $query->whereIn('message_id', function($mess) use ( $search ){
                $mess->select('id')->from('messages')
                ->where('title','like','%'.$search['title'].'%');

            });
        }

        $query  = $query->paginate(9);

        $redeems   = $query->map(function($p){
            $p->title = $p->message()->title;
            $p->link  = url('redeem/id/'.$p->id);
            return $p;
        });

        $r=[
          'header'=>'Redeem',
          'url.new'     =>url('redeem/new'),
          'url.search'  =>url('redeem/search'),

        ];
        return view('ex.kbv.redeem',compact('redeems','r','query','search'));
    }

    function do_add( $req ){
        DB::beginTransaction();
        $iss  = $this->issuer()->id;
        $mess = new Message();

        $mess->issuer_id  = $iss;
        $mess->title      = $req->title;
        $mess->type       = 'promotion';
        $mess->save();

        if($mess->id){
            $promotion             =  new Promotional;
            $promotion->issuer_id  =  $iss;
            $promotion->message_id =  $mess->id;
            $promotion->type       =  'redeem';

            $promotion->point      =  $req->point;
            $promotion->code       =  uniqid();
            $promotion->save();
            DB::commit();
            return $promotion;
          }
          else{
            DB::rollBack();
          }
    }


}
