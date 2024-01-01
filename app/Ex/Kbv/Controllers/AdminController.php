<?php namespace App\Ex\Kbv\Controllers;
use App\Ex\Kbv\Controllers\KbvController;
use App\Ex\Kbv\Model\KbvRole;

use App\Seed\Member;
use App\Basic\Sys\User;


use Illuminate\Http\Request;
use Session;
use Validator;
use DB;
use Auth;
use Hash;
class AdminController extends KbvController
{
    protected $roles = [
      'editor'  =>'nội dung',
      'admin'   =>'hệ thống',
    ];

    function index(){
      if( !$this->access())
        return redirect('/');

      $query  = KbvRole::paginate(6);

      $records = $query->map(function($rec){
          $u  = User::find($rec->user_id);
          if($u){
              $rec->name  = $u->public;
          }
          return $rec;
      });
      $roles  = $this->roles;
      return view('ex.kbv.admin',compact('records','query','roles'));
    }

     function add( Request $req ){
       $u  = new User;
       $u->public    =  $req->user;
       $u->password  =  bcrypt($req->pass);
       $u->save();
       if($u->id){
          $r  = new KbvRole;
          $r->user_id = $u->id;
          $r->role    = $req->role;
          $r->save();
          return back()->with([
              'flag'  =>'success',
              'mess'  =>'Tạo mới thành công'
          ]);
       }
     }
     function changepass(Request $req){
        $u =  Auth::user();
        $this->validate($req,[
              'new'    => 'required|max:255',
              'old'    => 'required|max:255',
          ]);
        if(Hash::check($req->old, $u->password)){
          $u->password  = bcrypt($req->new);
          $u->save();
          return back()->with([
                      'flag'  =>'success',
                      'mess'  =>'Thay đổi mật khẩu thành công!'
          ]);
        }
     }

     function action( Request $req ){
        $r  = KbvRole::find($req->id);

        switch ($req->action) {
          case 'lock':
              $r->status  = 'lock';
              $r->save();
              return back()->with([
                  'flag'  =>'success',
                  'mess'  =>'Đã khóa'
              ]);
            break;
          case 'unlock':
                $r->status  = 'unlock';
                $r->save();
                return back()->with([
                    'flag'  =>'success',
                    'mess'  =>'Đã mở khóa'
                ]);
              break;

          default:
              $r->role  = $req->role;
              $r->save();
              if($req->pass){
                  $u  = User::find($r->user_id);
                  $u->password  = bcrypt($req->pass);
                  $u->save();
              }
              return back()->with([
                  'flag'  =>'success',
                  'mess'  =>'Cập nhật thành công'
              ]);
            break;
        }
     }
}
