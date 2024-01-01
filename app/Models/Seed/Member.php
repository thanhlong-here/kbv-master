<?php
namespace App\Models\Seed;

use App\Models\Seed\Seed;
use App\Models\Seed\Transaction;
use DB;
class Member extends Seed
{
    protected $table     = "members";
    protected $fillable  = [
      'code','name','redeem','accumulate',
      'card_id','email','phone','status'];

    public function card(){
        return $this->belongsTo('App\Models\Issuer\Card')->first();
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


    public function withdraw($point,$note = 'redeem'){

        $this->redeempoint -= $point;
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
            $this->save();
            DB::commit();
            return;
        }
        DB::rollback();
    }
}
