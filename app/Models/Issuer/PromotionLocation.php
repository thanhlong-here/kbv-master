<?php
namespace App\Models\Issuer;

use App\Models\Issuer\Genitive;

class PromotionLocation extends Genitive
{
    protected $table    = "promotions_locations";
    protected $fillable = ['promotion_id','location_id'];
    use SoftDeletes;

    public function promotion(){
        return $this->belongsTo('App\Models\Issuer\Promotion')->first();
    }
    public function location(){
        return $this->belongsTo('App\Models\Issuer\Location')->first();
    }
}
