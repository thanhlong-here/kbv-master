<?php
namespace App\Models\Issuer;

use App\Models\Issuer\Genitive;

class Location extends Genitive
{
    protected $table = "locations";
    //protected $fillable = ['issuer_id','code','name','address','status'];
    use SoftDeletes;
}
