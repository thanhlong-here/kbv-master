<?php
namespace App\Issuer;

use App\Issuer\Genitive;

class MessageToMember extends Genitive
{
    protected $table = "messages_members";

    public function member(){
        return $this->belongsTo('App\Issuer\Member')->first();
    }

    public function message(){
        return $this->belongsTo('App\Issuer\Message')->first();
    }
}
