<?php
namespace App\Models\Issuer;

use App\Models\Issuer\Genitive;

class MessageToCard extends Genitive
{
    protected $table = "messages_cards";

    public function card(){
        return $this->belongsTo('App\Models\Issuer\Card')->first();
    }

    public function message(){
        return $this->belongsTo('App\Models\Issuer\Message')->first();
    }
}
