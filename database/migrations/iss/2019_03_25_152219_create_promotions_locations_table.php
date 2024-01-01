<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Schemas\Cell;

class CreatePromotionsLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('promotions_locations')) return;
        Cell::up('promotions_locations');
        Schema::table('promotions_locations', function (Blueprint $table) {

              $table->integer('location_id')->unsigned();
              $table->foreign('location_id')
              ->references('id')->on('locations');

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
        Cell::drop('promotions_locations');
    }
}
