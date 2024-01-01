<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('member_currency')) return;
        Schema::create('member_currency', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('currency_id')->unsigned()->nullable();
            $table->integer('member_id')->unsigned()->nullable();

            $table->integer('accumulate')->unsigned()->nullable();
            $table->integer('redeempoint')->unsigned()->nullable();
            
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
      Schema::dropIfExists('member_currency');
    }
}
