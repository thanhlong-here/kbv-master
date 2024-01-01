<?php
namespace App\Models\Issuer;

use App\Models\Models\Issuer\Genitive;

class PromotionGroup extends Genitive
{
    protected $table    = "promotions_groups";

    public function promotion(){
        return $this->belongsTo('App\Models\Models\Issuer\Promotion')->first();
    }

    public function group(){
        return $this->belongsTo('App\Models\Models\Group')->first();
    }
}
