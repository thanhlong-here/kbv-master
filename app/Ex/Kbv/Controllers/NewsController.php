<?php namespace App\Ex\Kbv\Controllers;
use App\Ex\Kbv\Controllers\KbvController;
use App\Issuer\Message;
use App\Basic\Media;

use Illuminate\Http\Request;
use App\Ex\Kbv\Helper;

use Session;
use Validator;
use DB;

class NewsController extends KbvController{

    public function index(){
        if( !$this->access())
          return redirect('/');
        return $this->news();
    }
    public function fresh(){
        if( !$this->access())
          return redirect('/');
        return view('ex.kbv.news.new');
    }

    public function detail( $id )
    {
        if( !$this->access())
          return redirect('/');
        $news = Message::find($id);
        $img    = $news->media_id ? Media::find($news->media_id)->source :
                  url('images/portrait/medium/avatar-m-4.png');
        $news->media  = $img ;
        return view('ex.kbv.news.detail',compact('news'));
    }

    //POST

    public function action(Request $req){
        $news = Message::find($req->news_id);

        switch ($req->action) {
          case 'delete':
              $news->delete();
              return redirect()->back()
              ->with([
                'flag'=>'susscess',
                'message'=>'Deleted'
              ]);
            break;
          case 'hot':
              $news->hot = 1;
              $news->save();
              return redirect()->back()
              ->with([
                'flag'=>'susscess',
                'message'=>'Finish'
              ]);
            break;
            case 'not':
                $news->hot = 0;
                $news->save();
                return redirect()->back()
                ->with([
                  'flag'=>'susscess',
                  'message'=>'Finish'
                ]);
              break;
              case 'push':
                  $info =  strip_tags(str_replace("&nbsp;",' ',$news->content));

                  $content = [
                     "en" =>$info,
                     "vi" =>$info
                  ];

                  $response = Helper::pushAll($content);

                  $return["allresponses"] = $response;
                  $return = json_encode($return);

                  $data = json_decode($response, true);

                  if(isset($data['id']))
                  {
                      return redirect()->back()
                      ->with([
                        'flag'=>'susscess',
                        'message'=>'Push Finish'
                      ]);
                  }
                  return redirect()->back()
                  ->with([
                    'flag'=>'failed',
                    'message'=>'Đã có lỗi!'
                  ]);

              break;
        }
    }

    public function add(  Request $req  ){
        if( !$this->access())
            return redirect('/');
        $this->validate($req,[
            'title' => 'required|max:255',
        ]);

        $news = $this->do_add($req);
        if($news->id){
          return redirect(url('news/id/'.$news->id))
          ->with(['flag'=>'success','message'=>'Tạo mới thành công']);
        }
        return redirect()->back()
        ->with(['flag'=>'failed','message'=>'Tạo mới không thành công']);
    }

    public function save( Request $req ){
        $this->validate($req,[
            'title' => 'required|max:255',
        ]);
        $news = Message::find($req->news_id);


        $news->title    = $req->title;
        $news->status   = 'active';
        $news->external = $req->external;
        $news->content  = $req->sumary;

        if($req->hasFile('media')){
            $src    = $req->media;
            $name   = uniqid().'.'.$src->getClientOriginalExtension();
            $src->move('upload',$name);

            $media          = new  Media;
            $media->source  = url('upload/'.$name);
            $media->type    = 'img';
            $media->user_id = $this->user()->id;

            $media->save();

            $news->media_id = $media->id;
        }

        $news->save();
        return redirect()->back()
        ->with(['flag'=>'success','message'=>'Lưu thành công']);
    }

    public function search(Request $req )
    {
        session(['search_news'=> ['title'=>$req->title]]);
        return redirect()->back();
    }
//private...

    function news(){

        $query = Message::Where('type','news')
                  ->where('issuer_id',$this->issuer()->id)
                  ->orderBy('hot', 'desc')
                  ->orderBy('created_at','desc');
        $search     =  session('search_news');
        if($search['title']){
            $query->where('title','like','%'.$search['title'].'%');
        }
        $news  = $query->paginate(9);


        $r=[
          'header'=>'Tin tức',
          'url.new'     =>url('news/new'),
          'url.search'  =>url('news/search'),
        ];
        return view('ex.kbv.news',compact('news','r','search'));
    }

    function do_add( $req ){
        $mess = new Message();
        $mess->issuer_id  = $this->is;
        $mess->title      = $req->title;
        $mess->type       = 'news';
        $mess->save();
        return $mess;
    }


}
