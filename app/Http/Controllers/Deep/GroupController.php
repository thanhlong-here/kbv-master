<?php
namespace App\Http\Controllers\Deep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Basic\Sys\Group;

class GroupController extends Controller
{

    public function index(){
        $groups  = Group::where('parent',0)
        ->get()->sortBy('name');

        $header  = 'Group';

        $parent = 0 ;

        return view('deep.group',compact(
          'groups','header','parent'));
    }

//GET
    public function groups(Request $req){

        $groups     = Group::where('parent',$req->parent)
        ->get()->sortBy('name');

        $p  = Group::find($req->parent)->first();

        $header  = $p->parent ?
        '<a href="'.url('group/'.$p->parent).'">'.$p->name.'</a>' :
        '<a href="'.url('group').'">'.$p->name.'</a>';

        $parent = $req->parent ;

        return view('deep.group',compact(
          'groups','header','parent'));
    }

//POST
    public function add(Request $req){
        $rule = [
          'code'   => 'required|max:255',
          'name'   => 'required|max:255',
        ];
        $this->validate($req,$rule);

        if( Group::exits($req->code) )
            return $this->e( 'Group này đã tồn tại' );
        $group = new Group;

        $group->name    = $req->name;
        $group->code    = $req->code;
        $group->parent  = $req->parent_id ? $req->parent_id :0;
        $group->save();

        return $this->e( 'Tạo mới thành công' );
    }
    public function edit(Request $req){

    }

    public function delete(Request $req){

    }
}
