<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Schemas\Cell;

class CreatePromotionsGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(Schema::hasTable('promotions_groups')) return;

      Cell::up('promotions_groups');
      Schema::table('promotions_groups', function (Blueprint $table) {

            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')
            ->references('id')->on('groups');

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
        Cell::drop('promotions_groups');
    }
}
