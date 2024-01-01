<?php namespace App\Http\Controllers;

use App\Http\Controllers\KbvController;

use App\Models\Seed\Member;
use App\Models\Issuer\Message;
use App\Models\Kbv\KbvSetting;
use App\Models\Kbv\KbvRelease;

use Illuminate\Http\Request;
use Session;
use Validator;
use DB;

class PageController extends KbvController
{
    protected $langs = [
        'active'  => 'có',
        'deactive' => 'không',
        'used'    => 'đã dùng'
    ];

    function index()
    {
        if (!$this->access())
            return redirect('/');

        $this->install();

        $news   = Message::Where('type', 'news')
            ->where('issuer_id', $this->is)->count();
        $report = [
            'member'  =>  Member::count(),
            'release' =>  KbvRelease::count(),
            'news'    =>  $news
        ];
        return view('dashboard', compact('report'));
    }

    function setting()
    {
        $setting  = KbvSetting::get();
        $a        = KbvSetting::byCode('lock.info.area');
        $g        = KbvSetting::byCode('lock.screen.game');

        $lock     = $a ? $a->content : 'false';
        $l_game   = $g ? $g->content : 'false';
        $items    = [
            'begin'       => KbvSetting::byCode('begin.scan')->content,
            'email'       => KbvSetting::byCode('feedback.email')->content,
            'lock.area'   => $lock == 'true' ? 'checked' : '',
            'lock.screen.game'   => $l_game == 'true' ? 'checked' : '',
        ];

        return view('setting', compact('items'));
    }

    function config(Request $req)
    {
        $check  = $req->lock_area ? 'true' : 'false';
        $c_game = $req->lock_screen_game ? 'true' : 'false';
        KbvSetting::upsave('begin.scan', 'Thời gian chấp nhận mã', $req->begin);
        KbvSetting::upsave('feedback.email', 'Email nhận phản hồi', $req->email);
        KbvSetting::upsave('lock.info.area', 'Khóa chỉnh khu vực', $check);
        KbvSetting::upsave('lock.screen.game', 'Khóa chỉnh khu vực', $c_game);

        return redirect()->back()
            ->with(['flag' => 'success', 'message' => 'Cập nhật thành công']);
    }
}
