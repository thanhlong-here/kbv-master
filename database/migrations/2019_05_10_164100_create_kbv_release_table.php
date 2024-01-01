<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKbvReleaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(Schema::hasTable('kbv_release')) return;
      Schema::create('kbv_release', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('mission_id');
          $table->integer('mem_id');
          $table->string('seri_no');
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
          Schema::dropIfExists('kbv_release');
    }
}
