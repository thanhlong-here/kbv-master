<?php
namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;

use Session;
use Validator;

use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function show()
    {
        return view('root.area');
    }

}
