<?php
namespace App\Schemas;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use App\Schemas\Simple;

class Post
{
    public static function up( $name )
    {
        Simple::up($name);
        Schema::table($name, function (Blueprint $table) {
              $table->text('content')->nullable();
              $table->string('title');
              $table->integer('media_id')->nullable();
			        $table->string('status')->default('draft');
        });
    }

    public static function drop( $name )
    {
        Simple::drop($name);
    }
}
