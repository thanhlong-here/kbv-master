<?php namespace App\Http\Controllers;

use App\Http\Controllers\KbvController;

use App\Models\Kbv\KbvMission;

use App\Models\Seed\Member;
use App\Models\Basic\Sys\Domain;
use App\Models\Basic\Sys\User;
use App\Models\Basic\Sys\City;
use App\Models\Issuer\Card;
use App\Models\Issuer\Issuer;
use App\Models\Basic\Sys\Phone;

use Illuminate\Http\Request;
use Session;
use Validator;
use Auth;
use DB;

class MemberController extends KbvController
{

    public function index()
    {
        if (!$this->access())
            return redirect('/');
        $query  = $this->members();
        $member = $query->map(function ($m) {
            $phone  = Phone::where('user_id', $m->user_id)->first();
            $u      = $m->user();
            $m->national =  $phone ? $phone->national : '';
            $m->number   =  $phone ? $phone->number : '';
            $m->city     =  City::find($m->area) ?  City::find($m->area)->name : '';
            return $m;
        });

        $search     = session('search_member');

        return view('member', compact('member', 'search', 'query'));
    }
    public function tester()
    {

        $secret  = Domain::where('name', 'app_kbv')->first()->secret;
        $r = [
            'header'  => 'Kiểm tra login',
            'private' => $secret,
            'action'  => url('member/tester')
        ];
        return view('member.tester', compact('r'));
    }

    public function login(Request $req)
    {
        $phone  = Phone::where('national', $req->national)
            ->where('number', $req->phone)->first();


        if (!$phone) {
            $mem    = $this->upgrade($req);

            $phone  = new Phone;
            $phone->national  = $req->national;
            $phone->number    = $req->phone;
            $phone->phone     = $req->national . $req->phone;
            $phone->user_id   = $mem->user_id;
            $phone->save();

            print_r($mem->toJson());
            exit;
        }
        $u  = User::find($phone->user_id);
        $mem  = Member::where('user_id', $u->id)->first();

        if (!$mem) $mem  = $this->newbie($u);
        $this->memSet($mem);

        $mem->private = $u->password;
        $mem->public  = $u->public;
        print_r($mem->toJson());
    }

    public function point($id)
    {
        if (!$this->access())
            return redirect('/');
        $mem  = Member::find($id);
        return view('.member.change', compact('mem'));
    }
    public function change(Request $req)
    {

        $this->validate($req, [
            'note'   => 'required|max:255',
            'point'  => 'required|numeric'

        ]);

        $mem  = Member::find($req->mem_id);

        if ($mem) {
            if ($req->change == 'add') {
                $mem->reward($req->point, $req->note);
            } else {
                $mem->withdraw($req->point, $req->note);
            }
        }


        return redirect()->back();
    }

    public function info(Request $req)
    {

        $this->validate($req, [
            'app_token' => 'required',
            'member'    => 'required|numeric'
        ]);
        $domain  = Domain::where('name', 'app_kbv')
            ->where('secret', $req->app_token)->first();
        if (!$domain)   return;
        $mem  = Member::find($req->member);
        $u    = $mem->user();

        $mem->public  = $u->public;
        $mem->private = $u->password;

        print_r($mem->toJson());
    }

    //POST//
    public function search(Request $req)
    {
        session(['search_member'  =>  [
            'code'  =>  $req->code
        ]]);

        return redirect()->back();
    }

    public function action(Request $req)
    {

        $mem  = Member::find($req->mem_id);
        switch ($req->action) {
            case 'lock':
                $mem->status  = 'deactive';
                break;
            case 'unlock':
                $mem->status  = 'active';
                break;
            default:
                // code...
                break;
        }
        $mem->save();

        return redirect()->back();
    }

    //private...
    function upgrade(Request $req)
    {

        DB::beginTransaction();
        $u            = new User;
        $u->password  = bcrypt(str_random(6));
        $u->public    = $req->national . $req->phone;
        $u->save();
        if ($u->id) {
            $mem  = $this->newbie($u);
            DB::commit();

            $this->memSet($mem);
            $mem->private = $u->password;
            $mem->public  = $u->public;
            return $mem;
        } else {
            DB::rollBack();
        }
    }

    function newbie($u)
    {
        $is   = $this->is;
        $c    = Card::default($is);

        $mem              = new Member;
        $mem->user_id     = $u->id;
        $mem->issuer_id   = $is;

        $mem->card_id     = $c->id;
        $mem->accumulate  = 0;
        $mem->redeempoint = 0;

        $mem->code        = $u->public;
        $mem->phone       = $u->public;
        $mem->save();
        return $mem;
    }

    function members()
    {
        $search = session('search_member') ? session('search_member') : [
            'code'  =>  ''
        ];
        $query  =  Member::where('issuer_id', $this->issuer()->id);
        if ($search) {
            $query->where('code', 'like', '%' . $search['code'] . '%');
        }
        return $query->orderBy('name', 'desc')->paginate(6);
    }
}
