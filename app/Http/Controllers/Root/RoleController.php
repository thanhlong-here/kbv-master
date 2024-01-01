<?php
namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Domain;
use App\Auth;
use App\User;
use App\Access;

use Session;
use Validator;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function show()
    {
      return view('root.role');
    }

    
}
