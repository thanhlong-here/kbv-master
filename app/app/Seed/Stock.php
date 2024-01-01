<?php
namespace App\Seed;

use App\Seed;

class Stock extends Seed
{
    protected $table    = "stocks";
    protected $fillable = ['ticket_id','status'];
    public function ticket(){
        return $this->belongsTo('App\Issuer\Ticket')->first();
    }
}
