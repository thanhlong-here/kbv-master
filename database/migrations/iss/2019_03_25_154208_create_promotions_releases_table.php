<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Schemas\Cell;

class CreatePromotionsReleasesTable extends Migration
{
      public function up()
      {
          if(Schema::hasTable('promotions_releases')) return;
          Cell::up('promotions_releases');
          Schema::table('promotions_releases', function (Blueprint $table) {
//'method','limit','times',
              $table->string('method');
              $table->integer('limit');
              $table->integer('times');

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
          Cell::drop('promotions_releases');
      }
}
