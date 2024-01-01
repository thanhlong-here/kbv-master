<?php namespace App\Http\Controllers\Iss;

use App\Http\Controllers\IssController;
use App\Issuer;
use App\Issuer\Message;


use Illuminate\Http\Request;
use Session;
use Validator;

class MessageController extends IssController
{
    public function index(){
        $messages   = Message::paginate(16)->sortByDesc('id');
        return view('iss.message',compact('messages'));
    }

    public function fresh(Request $req){
        $print  =  ["header"=>"Message"];
        return view('iss.message.new',compact('print'));
    }

    public function detail( $mid ){
        $image = url('/images/backgrounds/fb.jpg');
        $mess  = Message::find($mid)->first();

        $mess->img = $image;

        return view('iss.message.detail',compact('mess'));
    }

      ////POST////
    public function add(Request $req)
    {
        $this->validate($req,[
            'title' => 'required|max:255',
        ]);
        $mess             = new Message;
        $mess->title      = $req->message;
        $mess->issuer_id  = $this->issuer()->id;

        $mess->save();

        $this->to = url('message/detail/'.$mess->id);

        return redirect($this->to)
        ->with(['flag'=>'susscess','message'=>'Tạo thành công']);

    }

    public function edit(Request $req ){
        $this->validate($req,[
            'title' => 'required|max:255',
        ]);
        $mess             = Message::find($req->mess_id)->first();
        $mess->title      = $req->title;
        $mess->content    = $req->content;
        $mess->issuer_id  = $this->issuer()->id;

        $mess->save();

        $this->to = url('message/detail/'.$mess->id);

        return redirect($this->to)
        ->with(['flag'=>'susscess','message'=>'Lưu thành công']);
    }

    public function del(Request $request)
    {

    }

}
