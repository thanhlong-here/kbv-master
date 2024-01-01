<?php
namespace App\Models\Basic;

use App\Models\Basic\Cell;
use App\Models\Basic\Sys\User;

class Simple extends Cell
{
    public function user(){
        return  $this->belongsTo('App\Basic\Sys\User')->first();
    }

}
