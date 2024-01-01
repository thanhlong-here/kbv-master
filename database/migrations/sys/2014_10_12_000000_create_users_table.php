<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Schemas\Simple;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users'))
        {
            Schema::create('users', function (Blueprint $table) {
              $table->increments('id');
              $table->string('public');
              $table->boolean('verify')->default(false);
              $table->string('password');
              $table->string('status')->default('active');

              $table->softDeletes();
              $table->timestamps();
			        $table->rememberToken();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Simple::drop('users');
    }
}
