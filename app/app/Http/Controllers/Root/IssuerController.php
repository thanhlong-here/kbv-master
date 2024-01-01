<?php namespace App\Http\Controllers\Root;
use App\Http\Controllers\Controller;

use App\Basic\Sys\User;
use App\Issuer;

use Illuminate\Http\Request;
use Session;
use Validator;
use DB;


class IssuerController extends Controller
{
    public function index(){
        $issuers  = Issuer::paginate(8);
        return view('root.issuer',compact('issuers'));
    }
    public function fresh(){
        return view('root.issuer.new');
    }

    public function detail( $id ){
        $iss  = Issuer::find( $id );
        if($iss){
          return view ('root.issuer.detail',compact('iss'));
        }
        return $this->fresh();
    }

  ////POST////
    public function add(Request $req){

        $this->validate($req,[
          'title' => 'required|max:255',
          'user'  => 'required|max:255',
          'pass'  => 'required|max:255',
        ]);

        DB::beginTransaction();
        if( User::exits($req->user) )
              return $this->e( 'Tài khoản này đã tồn tại' );

        $u            = new User;
        $u->password  = bcrypt($req->pass);
        $u->public    = $req->user;
        $u->save();

        if($u->id){
            $iss            = new Issuer();
            $iss->title     = $req->title;
            $iss->user_id   = $u->id;
            $iss->save();
            DB::commit();
            return $this->s( 'Tạo thành công' );
        }
        DB::rollBack();
        return $this->e( 'Đã có lỗi' );
    }

    public function edit(Request $req ){
        $this->validate($req,['title' => 'required|max:255']);

        $iss        = Issuer::find($req->iss_id);
        $iss->title   = $req->title;
        $iss->status  = $req->status ? 'active' : 'draft';
        $iss->email   = $req->email;
        $iss->website = $req->website;
        $iss->content = $req->about;
        $iss->address = $req->address;
        $iss->phone   = $req->phone;
        $iss->save();

        return $this->s( 'Lưu thành công' );
    }

    public function del(Request $req){
        Issuer::find($req->issuer_id)->forceDelete();
        return  $this->s( 'Xóa thành công' );
    }

}
