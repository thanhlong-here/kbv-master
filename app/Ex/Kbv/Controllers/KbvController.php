<?php namespace App\Ex\Kbv\Controllers;
use App\Http\Controllers\IssController;

use App\Issuer\Message;
use App\Issuer\Promotional;
use App\Issuer\Mission;
use App\Issuer\PromotionMission;

use App\Issuer\PromotionPoint;


class KbvController extends IssController{
    protected $is     = 1; //id KBV
    protected $secret = '$2y$10$MReuyuYqrKanToS7CLvovuQ9qF.YMF4b6n9jshvGAtMxHElpg2vki';

    protected $games = [
      'scancode' => ['title'=>'Quét mã nhận điểm'],
      'luckyno'  => ['title'=>'Xổ số trúng thưởng']
    ];

    public function mem(){
        return  session('CurrentMember');
    }

    public function memSet($mem){
        session(['CurrentMember'   => $mem ]);
    }

    public function install(){
        $this->ins_scan();
        $this->ins_lucky();
    }

    function ins_scan(){
        $mission  = Mission::where('code','scancode')->first();
        if( $mission  ) return;

        $mission            = new Mission;
        $mission->code      = 'scancode';
        $mission->title     = $this->games['scancode']['title'];
        $mission->link      = url('screen/game/scancode');
        $mission->status    = 'active';
        $mission->issuer_id = $this->is;
        return Promotional::ins_mission($mission,0);
    }

    function ins_lucky(){
        $mission  = Mission::where('code','luckyno')->first();
        if( $mission  ) return;

        $mission            = new Mission;
        $mission->code      = 'luckyno';
        $mission->title     = $this->games['luckyno']['title'];
        $mission->link      = url('screen/game/luckyno');
        $mission->status    = 'active';
        $mission->issuer_id = $this->is;

        return Promotional::ins_mission($mission);
    }
}
