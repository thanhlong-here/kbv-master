<?php
namespace App\Basic\Sys;

use App\Basic\Sys\Access;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    public $is;

    protected $table = "users";

    public static function exits( $name )
    {
        $u =  User::withTrashed()
              ->where('public', $name )
              ->first();
        return $u ? true : false;
    }

    public static  function accesss()
    {
        return $this->hasMany('Access');
    }
}
