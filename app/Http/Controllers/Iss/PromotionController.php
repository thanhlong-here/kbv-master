<?php namespace App\Http\Controllers\Iss;

use App\Http\Controllers\IssController;

use App\Save\RootIssuer as Save;

use App\Basic\Sys\User;
use App\Issuer;

use Illuminate\Http\Request;
use Session;
use Validator;

class PromotionController extends IssController
{

    public function index()
    {
        //$issuers  = Promotion::paginate(8);
        return view('iss.promotion');
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
