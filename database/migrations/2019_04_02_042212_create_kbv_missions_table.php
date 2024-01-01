<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKbvMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
      if(Schema::hasTable('kbv_missions')) return;
      Schema::create('kbv_missions', function (Blueprint $table) {
          $table->increments('id');
          $table->string('product_id');
          $table->integer('points');

          $table->softDeletes();
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kbv_missions');
    }
}
