<?php
namespace App\Basic;

use App\Basic\Cell;
use App\Basic\Sys\User;

class Simple extends Cell
{
    public function user(){
        return  $this->belongsTo('App\Basic\Sys\User')->first();
    }

}
