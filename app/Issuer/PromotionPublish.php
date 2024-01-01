<?php
namespace App\Issuer;

use App\Issuer\Genitive;

class Promotion extends Genitive
{
    protected $table = "promotions_publishs";

    /*
    'type','point',
    'publish','expired',
    'method','limit','times',
    protected $fillable = [
      'message_id','code','tags','seen',
     ];
    */
    public function message(){
        return $this->belongTo('App\Issuer\Message')->first();
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

}
