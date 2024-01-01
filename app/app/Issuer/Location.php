<?php
namespace App\Issuer;

use App\Issuer\Genitive;

class Location extends Genitive
{
    protected $table = "locations";
    //protected $fillable = ['issuer_id','code','name','address','status'];
    use SoftDeletes;
}
