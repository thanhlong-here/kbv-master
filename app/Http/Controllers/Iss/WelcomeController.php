<?php namespace App\Http\Controllers\Iss;
use App\Http\Controllers\Controller;
use App\Save\RootIssuer as Save;

use App\Basic\Sys\User;
use App\Issuer;

use Illuminate\Http\Request;
use Session;
use Validator;
use Auth;
class WelcomeController extends Controller{

    public function index(){
        $step = 'start';
        $user = null;

        return view('iss.login',compact('step','user'));
    }

    public function login(Request $req ){
        $this->validate($req,['user' => 'required|max:255',]);
        $u  = User::where('public',$req->user)->first();

        if( is_null($u) )
            return redirect('/')->with('status','Not Account');

        switch ($req->step) {
          case 'end':
              $a = Auth::attempt([
                'public'=>$req->user,'password'=>$req->pass
              ]);

              if(!$a)
                return redirect()->back()
                ->with(['flag'=>'danger','message'=>'Login failed']);

              $iss  = Issuer::findBy($u->id)->first();

              session(['CurrentUser' => $u ]);
              session(['CurrentIssuer' => $iss ]);

              return redirect(url('dashboard'));

            break;
          default:
              $step = 'end';
              $user = $req->user;
              return view('iss.login',compact('step','user'));
            break;
        }
    }

}
