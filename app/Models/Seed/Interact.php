<?php
namespace App\Models\Seed;

use App\Models\Seed\Seed;

class Interact extends Seed{
    protected $table    = "interacts";
    protected $fillable = ['type','action','note'];
}
