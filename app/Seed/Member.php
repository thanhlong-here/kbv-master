<?php
namespace App\Seed;

use App\Seed;
use App\Issuer\MemberCurrency;
use App\Seed\Transaction;
use DB;
class Member extends Seed
{
    protected $table     = "members";
    protected $fillable  = [
      'code','name','redeem','accumulate',
      'card_id','email','phone','status'];

    public function card(){
        return $this->belongsTo('App\Issuer\Card')->first();
    }

    public function reward($point,$note = 'reward'){
        DB::beginTransaction();
        $tran       =   new Transaction;
        $tran->in   =   $point;
        $tran->type =   'reward';
        $tran->note =   $note;

        $tran->user_id    =   $this->user_id;
        $tran->member_id  =   $this->id;
        $tran->issuer_id  =   $this->issuer_id;

        $tran->save();
        if($tran->id){
            $this->accumulate  += $point;
            $this->redeempoint += $point;
            $this->save();
            DB::commit();
            return;
        }
        DB::rollback();
    }

    public function reward_xu($point,$note = 'reward'){
        DB::beginTransaction();
        $tran       =   new Transaction;
        $tran->in   =   $point;
        $tran->type =   'reward';
        $tran->note =   $note;

        $tran->user_id    =   $this->user_id;
        $tran->member_id  =   $this->id;
        $tran->issuer_id  =   $this->issuer_id;
        $tran->currency_id  =   1;

        $tran->save();
        if($tran->id){

            // Save member currency 
            $memCur = MemberCurrency::where([
                ['member_id', $this->id],
                ['currency_id', 1]
            ])->first();
            if (!$memCur)
                $memCur = new MemberCurrency;

            $memCur->currency_id = 1;
            $memCur->member_id = $this->id;
            $memCur->accumulate += $point;
            $memCur->redeempoint += $point;
            $memCur->save();

            DB::commit();
            return;
        }
        DB::rollback();
    }

    public function withdrawxu($point, $note = 'redeem')
    {
        //if( $this->redeempoint < 0 ) return;

        DB::beginTransaction();
        $tran       =   new Transaction;
        $tran->out  =   $point;
        $tran->type =   'redeem';
        $tran->note =   $note;

        $tran->user_id    =   $this->user_id;
        $tran->member_id  =   $this->id;
        $tran->issuer_id  =   $this->issuer_id;
        $tran->currency_id  =   1;

        $tran->save();
        if ($tran->id) {
            // Save member currency 
            $memCur = MemberCurrency::where([
                ['member_id', $this->id],
                ['currency_id', 1]
            ])->first();
            if (!$memCur)
                $memCur = new MemberCurrency;

            $memCur->currency_id = 1;
            $memCur->member_id = $this->id;
            $memCur->redeempoint -= $point;
            $memCur->save();

            DB::commit();
            return;
        }
        DB::rollback();
    }

    public function withdrawxuWithoutTran($point)
    {
        DB::beginTransaction();
        // Save member currency 
        $memCur = MemberCurrency::where([
            ['member_id', $this->id],
            ['currency_id', 1]
        ])->first();
        if (!$memCur)
            $memCur = new MemberCurrency;

        $memCur->currency_id = 1;
        $memCur->member_id = $this->id;
        $memCur->redeempoint -= $point;
        $memCur->save();

        DB::commit();
        return;
    }

    public function withdraw($point,$note = 'redeem'){


        //if( $this->redeempoint < 0 ) return;

        DB::beginTransaction();
        $tran       =   new Transaction;
        $tran->out  =   $point;
        $tran->type =   'redeem';
        $tran->note =   $note;

        $tran->user_id    =   $this->user_id;
        $tran->member_id  =   $this->id;
        $tran->issuer_id  =   $this->issuer_id;

        $tran->save();
        if($tran->id){
            $this->redeempoint -= $point;
            $this->save();
            DB::commit();
            return;
        }
        DB::rollback();
    }
}
