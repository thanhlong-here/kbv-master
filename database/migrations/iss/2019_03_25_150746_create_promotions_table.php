<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Schemas\Cell;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(Schema::hasTable('promotions')) return;

      Cell::up('promotions');
      Schema::table('promotions', function (Blueprint $table) {
            $table->string('code');//Check Issuer

            $table->string('type')->default('reward');
            $table->integer('point')->nullable();

            $table->tinyInteger('seen')->default(1);
            $table->tinyInteger('upgrade')->default(0);
            $table->string('tags')->nullable();

            $table->integer('message_id')->unsigned();
            $table->foreign('message_id')
            ->references('id')->on('messages');

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
        Cell::drop('promotions');
    }
}
