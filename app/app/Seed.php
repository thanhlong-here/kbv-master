<?php
namespace App;

use App\Basic\Cell;

class Seed extends Cell
{
    protected $table = "seeds";
    //protected $fillable = ['issuer_id'];
    public function issuer(){
        return $this->belongsTo('App\Issuer')->first();
    }

    public function user(){
        return  $this->belongsTo('App\Basic\Sys\User')->first();
    }
}
