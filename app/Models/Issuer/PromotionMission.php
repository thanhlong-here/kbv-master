<?php
namespace App\Models\Issuer;

use App\Models\Issuer\Genitive;

class PromotionMission extends Genitive
{
    protected $table  = "promotions_missions";
    public function promotion(){
        return $this->belongsTo('App\Models\Issuer\Promotion')->first();
    }
    public function mission(){
        return $this->belongsTo('App\Models\Issuer\Mission')->first();
    }
}
