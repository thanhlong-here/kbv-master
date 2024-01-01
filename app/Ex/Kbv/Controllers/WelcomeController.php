<?php namespace App\Ex\Kbv\Controllers;
use App\Http\Controllers\Controller;

use App\Basic\Sys\User;
use App\Ex\Kbv\Model\KbvRole;
use App\Issuer;

use Illuminate\Http\Request;
use Session;
use Validator;
use Auth;

use Config;

class WelcomeController extends KbvController{

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

              session(['CurrentUser'   => $u ]);
              $iss        =  Issuer::find($this->is);
              if(Issuer::where('user_id',$u->id)->first()){
                $iss->role = 'super';
              }
              else{
                $iss->role = KbvRole::where('user_id',$u->id)->first()->role;
              }
              session(['CurrentIssuer' => $iss ]);

              switch ($iss->role) {
                case 'super':
                      return redirect(url('dashboard'));
                  break;
                case 'editor':
                        return redirect(url('news'));
                    break;
                default:
                  // code...
                  break;
              }

            break;
          default:
              $step = 'end';
              $user = $req->user;
              return view('iss.login',compact('step','user'));
            break;
        }
    }

}
