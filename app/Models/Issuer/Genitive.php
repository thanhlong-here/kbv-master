<?php
namespace App\Models\Issuer;
use App\Models\Basic\Cell;

class Genitive extends Cell
{
    public function issuer(){
        return $this->belongsTo('App\Models\Issuer\Issuer')->first();
    }
}
