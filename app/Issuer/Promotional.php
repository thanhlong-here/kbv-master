<?php
namespace App\Issuer;

use App\Issuer\Message;
use App\Issuer\PromotionMission;

use App\Issuer\Genitive;
use DB;


class Promotional extends Genitive
{
    protected $table = "promotions";
    //protected $fillable = ['issuer_id','code','name','parent','status'];



    public function message(){
        return $this->belongsTo('App\Issuer\Message')->first();
    }

    public function groups(){
        return $this->hasMany('App\Issuer\PromotionGroup')->get();
    }

    public function locations(){
        return $this->hasMany('App\Issuer\PromotionLocation')->get();
    }

    public function publish(){
        return $this->hasOne('App\Issuer\PromotionPublish')->first();
    }

    public function release(){
        return $this->hasOne('App\Issuer\PromotionRelease')->first();
    }

    public function point(){
        return $this->hasOne('App\Issuer\PromotionPoint')->first();
    }
    public function mission(){
        return $this->hasOne('App\Issuer\PromotionMission')->first();
    }

    public static function ins_mission( $mission,$seen = 1 ){
        DB::beginTransaction();
        $mission->save();
        $message              = new Message;
        $message->title       = $mission->title;
        $message->issuer_id   = $mission->issuer_id;
        $message->type        = 'promotion';

        $message->save();

        $p              = new Promotional;
        $p->message_id  = $message->id;
        $p->issuer_id   = $message->issuer_id;
        $p->type        = 'mission';
        $p->seen        = $seen;
        $p->code        = $mission->code;
        $p->save();

        $pm                 = new PromotionMission;
        $pm->issuer_id      = $p->issuer_id;
        $pm->promotion_id   = $p->id;
        $pm->mission_id     = $mission->id;

        $pm->save();

        if($pm->id){
            DB::commit();
            return $p;
        }
        DB::rollBack();
    }
}
