<?php namespace App\Http\Controllers\Iss;
use App\Http\Controllers\IssController;

use App\Issuer\Promotion;
use App\Issuer\Message;

use Illuminate\Http\Request;
use Session;
use Validator;

class UpgradeController extends IssController
{
    public function index()
    {
        $promotions   =   Promotion::where('upgrade',1)->paginate(16)->sortByDesc('id');
        $r  = [
          "header"     =>  'Upgrade',
          'url.new'    =>  url('upgrade/new'),
          'url.search' =>  url('upgrade/search'),
          'url.detail' =>  url('upgrade/detail/'),
        ];
        return view('iss.promotion',compact('promotions','r'));
    }
    public function fresh(){
        $r  =  [
          "header"  =>  "Upgrade",
          "action"  =>  url('upgrade/add'),
        ];
        return view('iss.promotion.new',compact('r'));
    }

    public function detail( $id ){
        $image = url('/images/backgrounds/fb.jpg');

        $r  =  [
          "header"  =>  "Upgrade",
          "action"  =>  url('upgrade/edit'),
        ];

        $pmo  = Promotion::find( $id )->first();

        $pmo->img = $image;

        return view('iss.promotion.detail',compact('pmo','r'));
    }

  ////POST////
    public function add(Request $req)
    {
        $this->validate($req,[
            'title' => 'required|max:255',
        ]);
        $mess             = new Message;
        $mess->title      = $req->title;
        $mess->issuer_id  = $this->issuer()->id;

        $mess->save();

        if($mess->id){
            $p = new Promotion;
            $p->message_id  = $mess->id;
            $p->issuer_id   = $mess->issuer_id;
            $p->code        = uniqid();
            $p->upgrade     = 1;
            $p->seen        = 0;
            $p->save();
        }

        $this->to = url('upgrade/detail/'.$p->id);

        return redirect($this->to)
        ->with(['flag'=>'susscess','message'=>'Tạo thành công']);
    }

    public function edit(Request $req )
    {
        $this->validate($req,[
            'title' => 'required|max:255',
        ]);
        $pmo  = Promotion::find($req->pmo_id);

        $mess             = $pmo->message();
        $mess->title      = $req->title;
        $mess->content    = $req->content;
        $mess->issuer_id  = $this->issuer()->id;

        $mess->save();

        $to = url('upgrade/detail/'.$pmo->id);

        return redirect($to)
        ->with(['flag'=>'susscess','message'=>'Lưu thành công']);
    }

    public function del(Request $request)
    {

    }

}
