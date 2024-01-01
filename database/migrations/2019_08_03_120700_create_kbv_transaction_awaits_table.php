<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKbvTransactionAwaitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('kbv_transaction_awaits')) return;
        Schema::create('kbv_transaction_awaits', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('redeem_num')->unsigned()->nullable();
            $table->integer('currency_id')->unsigned()->nullable();
            $table->integer('member_id')->unsigned()->nullable();
            $table->string('bank_name', 254)->nullable();
            $table->string('bank_number', 254)->nullable();
            $table->string('user_name', 254)->nullable();

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
        Schema::dropIfExists('kbv_transaction_awaits');
    }
}
