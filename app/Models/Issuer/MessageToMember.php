<?php
namespace App\Models\Issuer;

use App\Models\Issuer\Genitive;

class MessageToMember extends Genitive
{
    protected $table = "messages_members";

    public function member(){
        return $this->belongsTo('App\Models\Issuer\Member')->first();
    }

    public function message(){
        return $this->belongsTo('App\Models\Issuer\Message')->first();
    }
}
