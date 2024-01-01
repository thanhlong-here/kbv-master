<?php
namespace App\Issuer;

use App\Issuer\Genitive;

class MessageToCard extends Genitive
{
    protected $table = "messages_cards";

    public function card(){
        return $this->belongsTo('App\Issuer\Card')->first();
    }

    public function message(){
        return $this->belongsTo('App\Issuer\Message')->first();
    }
}
