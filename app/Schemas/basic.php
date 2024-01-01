<?php
namespace App\Schemas;

use Illuminate\Database\Schema\Blueprint;

class Basic
{
    public static function cell( Blueprint $table )
    {
        $table->increments('id');
        $table->timestamps();
        $table->softDeletes();
    }
    public static function simple( Blueprint $table )
    {
        $table->increments('id');
        $table->timestamps();
        $table->softDeletes();
        $table->integer('user_id')->unsigned();
    }
  

}
