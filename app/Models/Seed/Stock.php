<?php
namespace App\Models\Seed;

use App\Models\Seed\Seed;

class Stock extends Seed
{
    protected $table    = "stocks";
    protected $fillable = ['ticket_id','status'];
    public function ticket(){
        return $this->belongsTo('App\Models\Issuer\Ticket')->first();
    }
}
