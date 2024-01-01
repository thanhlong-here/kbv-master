<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Schemas\Simple;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('stocks')) return;
        Simple::up('stocks');
        Schema::table('stocks', function (Blueprint $table) {
            $table->string('status');//nouse//used;

            $table->integer('ticket_id')->unsigned();
            $table->foreign('ticket_id')
            ->references('id')->on('tickets');

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
        Simple::drop('stocks');
    }
}
