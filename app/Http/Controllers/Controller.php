<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Session;
use Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
       $this->to = Request()->route()->getPrefix();
    }

    public function e( $mess ){
        return $this->m($mess,'error');
    }

    public function s( $mess )
    {
        return $this->m($mess);
    }

    public function m($mess, $st = 'sussess'){
        Session::flash($st, $mess );
        return redirect( $this->to );
    }
}
