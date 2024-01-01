<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('bank_accounts')) return;
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('member_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('bank_name', 254)->nullable();
            $table->string('bank_number', 254)->nullable();
            $table->string('name', 254)->nullable();

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
        Schema::dropIfExists('bank_accounts');
    }
}
