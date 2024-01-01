<?php
namespace App\Basic\Sys;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    public $timestamps  = false;
}
