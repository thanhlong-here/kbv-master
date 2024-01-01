<?php
namespace App\Models\Issuer;
use App\Models\Issuer\Genitive;

class Ticket extends Genitive
{
    protected $table    = "tickets";
    protected $fillable = ['promotion_id','code','status'];

    use SoftDeletes;

    public function promotion(){
        return $this->belongsTo('App\Models\Issuer\Promotion')->first();
    }

}
