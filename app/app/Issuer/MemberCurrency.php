<?php
namespace App\Issuer;
use App\Basic\Cell;

class MemberCurrency extends Cell
{
    protected $table = "member_currency";
    protected $fillable = ['currency_id','member_id', 'accumulate', 'redeempoint'];
}
