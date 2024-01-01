<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Schemas\Cell;

class CreatePromotionsPublishsTable extends Migration
{
    public function up()
    {
        if(Schema::hasTable('promotions_publishs')) return;
        Cell::up('promotions_publishs');
        Schema::table('promotions_publishs', function (Blueprint $table)
        {

            $table->timestamp('start');
            $table->timestamp('expired');

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
        Cell::drop('promotions_publishs');
    }
}
