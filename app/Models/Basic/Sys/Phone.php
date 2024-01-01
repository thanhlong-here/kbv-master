<?php
namespace App\Models\Basic\Sys;

use App\Models\Basic\Simple;

class Phone extends Simple
{
    protected $table = "phones";
    protected $fillable = ['user_id','national','number','phone'];
}
