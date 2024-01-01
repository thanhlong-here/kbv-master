<?php
namespace App\Issuer;

use App\Issuer\Genitive;

class PromotionGroup extends Genitive
{
    protected $table    = "promotions_groups";

    public function promotion(){
        return $this->belongsTo('App\Issuer\Promotion')->first();
    }

    public function group(){
        return $this->belongsTo('App\Group')->first();
    }
}
