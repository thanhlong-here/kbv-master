<?php
namespace App\Issuer;
use App\Issuer\Genitive;

class Ticket extends Genitive
{
    protected $table    = "tickets";
    protected $fillable = ['promotion_id','code','status'];

    use SoftDeletes;

    public function promotion(){
        return $this->belongsTo('App\Issuer\Promotion')->first();
    }

}
