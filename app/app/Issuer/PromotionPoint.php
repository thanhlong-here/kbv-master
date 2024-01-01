<?php
namespace App\Issuer;

use App\Issuer\Genitive;

class PromotionPoint extends Genitive
{
    protected $table = "promotions_points";
    protected $fillable = [
      'type','point',
     ];
    public function promotion(){
        return $this->belongsTo('App\Issuer\Promotion')->first();
    }


}
