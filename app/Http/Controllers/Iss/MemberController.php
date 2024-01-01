<?php namespace App\Http\Controllers\Iss;
use App\Http\Controllers\Controller;
use App\Save\RootIssuer as Save;

use App\Basic\Sys\User;
use App\Issuer\Member;

use Illuminate\Http\Request;
use Session;
use Validator;

class MemberController extends Controller
{
      public function index()
      {
          $members  = Member::paginate(16);
          return view('iss.member',compact('members'));
      }
      public function fresh()
      {

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
      function load()
      {

      }
}
