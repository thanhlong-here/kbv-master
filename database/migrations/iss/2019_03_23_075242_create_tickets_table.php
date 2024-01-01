<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


use App\Schemas\Cell;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        if(Schema::hasTable('tickets')) return;
        Cell::up('tickets');
        Schema::table('tickets', function (Blueprint $table) {
  //'method','limit','times',
            $table->string('code');
            $table->string('status');//publish

            $table->integer('promotion_id')->unsigned();
            $table->foreign('promotion_id')
              ->references('id')->on('promotions');

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
        Cell::drop('tickets');
    }
}
