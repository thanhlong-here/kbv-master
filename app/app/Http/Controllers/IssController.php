<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Session;
use Validator;

class IssController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function issuer(){
        return session('CurrentIssuer');
    }

    public function user(){
        return session('CurrentUser');
    }

    public function access(){
        return ($this->issuer() && $this->user()) ? true :false;
    }
}
