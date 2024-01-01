<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Schemas\Cell;

class CreatePromotionsPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         if(Schema::hasTable('promotions_points')) return;
         Cell::up('promotions_points');
         Schema::table('promotions_points', function (Blueprint $table) {

              $table->string('type')->default('reward');
              $table->integer('point')->default(0);

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
         Cell::drop('promotions_points');
     }
}
