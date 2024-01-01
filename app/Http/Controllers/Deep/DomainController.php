<?php
namespace App\Http\Controllers\Deep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Basic\Sys\Domain;
use App\Basic\Sys\User;
use App\Basic\Sys\Access;
use DB;

class DomainController extends Controller
{
    public function index()
    {
        $domains  =  Domain::paginate(8);

        return view('deep.domain',compact('domains'));
    }
    public function fresh()
    {
        return view('deep.domain.new');
    }


//POST
    public function add(Request $req){
        $rule = [
          'domain' => 'required|max:255',
          'user'   => 'required|max:255',
          'pass'   => 'required|max:255',
        ];
        $this->validate($req,$rule);

        DB::beginTransaction();

        if( Domain::exits($req->domain) ){
            return $this->e( 'Domain này đã tồn tại' );
        }

        if( User::exits($req->user) )
            return $this->e( 'User này đã tồn tại' );

        $u            = new User;
        $u->password  = bcrypt($req->pass);
        $u->public    = $req->user;
        $u->save();
        if($u->id){
            $dm           = new Domain;
            $dm->name     = $req->domain;
            $dm->secret   = bcrypt(str_random(12));
            $dm->user_id  = $u->id;
            $dm->save();
            if( $dm->id ){
                $access = new Access;
                $access->domain_id  = $dm->id;
                $access->user_id    = $u->id;
                $access->save();
                DB::commit();
                return $this->e( 'Thành công' );
            }
        }
        DB::rollBack();

        return $this->e( 'Đã có lỗi' );
    }


    public function edit(Request $req)
    {
        $rule = [ 'domain' => 'required|max:255'];
        $this->validate($req,$rule);

        $dm       = Domain::find($req->domain_id);
        $dm->name = $req->domain;
        $dm->save();

        return $this->s( 'Lưu thành công' );
    }

    public function del(Request $req)
    {
          Domain::find( $req->domain_id )->forceDelete();
          return $this->s( 'Xóa thành công' );
    }


}
