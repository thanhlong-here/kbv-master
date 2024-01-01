<?php namespace App\Http\Controllers\Iss;

use App\Http\Controllers\IssController;

use App\Basic\Sys\User;
use App\Issuer;

use Illuminate\Http\Request;
use Session;
use Validator;

class DashboardController extends IssController
{
    public function index(){
        if( $this->access())
          return view('iss.dashboard');
        return redirect('/');  
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
}
