<?php
namespace App\Models\Seed;

use App\Models\Basic\Cell;

class Seed extends Cell
{
    protected $table = "seeds";
    //protected $fillable = ['issuer_id'];
    public function issuer(){
        return $this->belongsTo('App\Models\Issuer\Issuer')->first();
    }

    public function user(){
        return  $this->belongsTo('App\Models\Basic\Sys\User')->first();
    }
}
