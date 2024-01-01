<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('promotion_currency')) return;
        Schema::create('promotion_currency', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('currency_id')->unsigned()->nullable();
            $table->integer('promotion_id')->unsigned()->nullable();
            $table->integer('mission_id')->unsigned()->nullable();

            $table->integer('currency_number')->unsigned()->nullable();
            
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
      Schema::dropIfExists('promotion_currency');
    }
}
