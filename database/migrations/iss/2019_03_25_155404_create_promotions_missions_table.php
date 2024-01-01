<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Schemas\Cell;

class CreatePromotionsMissionsTable extends Migration
{
      public function up()
      {
          if(Schema::hasTable('promotions_missions')) return;
          Cell::up('promotions_missions');
          Schema::table('promotions_missions', function (Blueprint $table) {
    //'method','limit','times',
              $table->integer('mission_id')->unsigned();
              $table->foreign('mission_id')
                ->references('id')->on('missions');

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
          Cell::drop('promotions_missions');
      }
}
