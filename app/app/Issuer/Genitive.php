<?php
namespace App\Issuer;
use App\Basic\Cell;

class Genitive extends Cell
{
    public function issuer(){
        return $this->belongsTo('App\Issuer')->first();
    }
}
