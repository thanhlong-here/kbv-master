<?php
namespace App\Seed;

use App\Seed;

class Interact extends Seed{
    protected $table    = "interacts";
    protected $fillable = ['type','action','note'];
}
