<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Schemas\Simple;

class CreateInteractsTable extends Migration
{
      /**
       * Run the migrations.
       *
       * @return void
       */
      public function up()
      {
          if(Schema::hasTable('interacts')) return;
          Simple::up('interacts');
          Schema::table('interacts', function (Blueprint $table) {
              $table->string('type');
              $table->string('action');
              $table->string('note');
              $table->string('status');

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
          Simple::drop('interacts');
      }
}
