<?php
namespace App\Basic\Sys;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table    = 'groups';
    public $timestamps  = false;

    public static function exits($code)
    {
        $group = Group::where('code', $code )->first();
        return $group ? true : false;
    }
}
