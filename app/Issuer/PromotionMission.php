<?php
namespace App\Issuer;

use App\Issuer\Genitive;

class PromotionMission extends Genitive
{
    protected $table  = "promotions_missions";
    public function promotion(){
        return $this->belongsTo('App\Issuer\Promotion')->first();
    }
    public function mission(){
        return $this->belongsTo('App\Issuer\Mission')->first();
    }
}
