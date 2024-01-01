<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('accesss')) return;
        
        Schema::create('accesss', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('domain_id');
            $table->integer('user_id');

            $table->foreign('user_id')
            ->references('id')->on('users');

            $table->foreign('domain_id')
            ->references('id')->on('domains');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accesss');
    }
}
