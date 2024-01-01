<?php
namespace App\Models\Issuer;

use App\Models\Issuer\Genitive;

class PromotionPoint extends Genitive
{
    protected $table = "promotions_points";
    protected $fillable = [
      'type','point',
     ];
    public function promotion(){
        return $this->belongsTo('App\Models\Issuer\Promotion')->first();
    }


}
