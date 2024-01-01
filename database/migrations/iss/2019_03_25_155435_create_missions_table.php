<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Schemas\Cell;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(Schema::hasTable('missions')) return;

      Cell::up('missions');
      Schema::table('missions', function (Blueprint $table) {
            $table->string('title');
            $table->string('code');
            $table->string('link');
            $table->string('status')->default('draft');

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
          Cell::drop('messages');
    }
}
