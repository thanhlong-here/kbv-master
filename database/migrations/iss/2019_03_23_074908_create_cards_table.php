<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Schemas\Cell;
class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(Schema::hasTable('cards')) return;

      Cell::up('cards');
      Schema::table('cards', function (Blueprint $table) {
            $table->string('code');

            $table->string('title');
            $table->string('status')->default('draft');

            $table->integer('parent');

            $table->text('content')->nullable();
            $table->integer('media_id')->nullable();

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
        Cell::drop('cards');
    }
}
