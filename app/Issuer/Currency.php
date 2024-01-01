<?php
namespace App\Issuer;
use App\Basic\Cell;

class Card extends Cell
{
    protected $table = "currency";
    protected $fillable = ['issuer_id','name'];
}
