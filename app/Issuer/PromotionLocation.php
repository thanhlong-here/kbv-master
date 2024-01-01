<?php
namespace App\Issuer;

use App\Issuer\Genitive;

class PromotionLocation extends Genitive
{
    protected $table    = "promotions_locations";
    protected $fillable = ['promotion_id','location_id'];
    use SoftDeletes;

    public function promotion(){
        return $this->belongsTo('App\Issuer\Promotion')->first();
    }
    public function location(){
        return $this->belongsTo('App\Issuer\Location')->first();
    }
}
