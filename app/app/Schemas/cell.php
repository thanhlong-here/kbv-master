<?php
namespace App\Schemas;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use App\Schemas\Basic;

class Cell
{
    public static function up( $name )
    {
        Schema::create($name, function (Blueprint $table) {
            Basic::cell( $table );
        });
    }

    public static function drop( $name )
    {
        Schema::dropIfExists( $name );
    }
}
