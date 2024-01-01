<?php
namespace App\Schemas;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


use App\Schemas\Simple;

class Media
{
    public static function up( $name)
    {
        Simple::up($name);
        Schema::table($name, function (Blueprint $table) {
            $table->string('source');
            $table->string('type')->default('image');//image,video,youtube,...
        });
    }

    public static function drop( $name )
    {
        Simple::drop($name);
    }
}
