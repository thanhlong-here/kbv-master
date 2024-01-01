<?php
namespace App\Schemas;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

use App\Schemas\Basic;

class Simple
{
    public static function up( $name )
    {
        Schema::create($name, function (Blueprint $table) {
            Basic::simple( $table );
        });
        /*
        Schema::create($name.'_ex', function (Blueprint $table) {
            Basic::ex( $table);
        });
        */
        Schema::table($name, function(Blueprint $table) {
			       $table->foreign('user_id')
             ->references('id')->on('users');
		     });
        //DB::table('stocks')->insert( ['model' => $name ] );
    }

    public static function drop( $name )
    {
        Schema::dropIfExists( $name );
    }
}
