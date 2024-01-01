<?php
namespace App;

use App\Basic\Simple;

class Phone extends Simple
{
    protected $table = "phones";
    protected $fillable = ['user_id','national','number','phone'];
}
