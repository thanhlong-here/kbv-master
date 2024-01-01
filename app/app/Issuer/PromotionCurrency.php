<?php
namespace App\Issuer;
use App\Basic\Cell;

class PromotionCurrency extends Cell
{
    protected $table = "promotion_currency";
    protected $fillable = ['currency_id','promotion_id', 'currency_number','mission_id'];
}
