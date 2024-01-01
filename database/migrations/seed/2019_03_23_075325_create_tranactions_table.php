<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Schemas\Simple;

class CreateTranactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('transactions')) return;
        Simple::up('transactions');
        Schema::table('transactions', function (Blueprint $table) {
            $table->integer('in')->default(0);
            $table->integer('out')->default(0);

            $table->integer('interact_id')->unsigned();
            $table->foreign('interact_id')
            ->references('id')->on('interacts');

            $table->integer('issuer_id')->unsigned();
            $table->foreign('issuer_id')
            ->references('id')->on('issuers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Simple::drop('transactions');
    }


}
