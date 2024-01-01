<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Schemas\Cell;
class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(Schema::hasTable('messages')) return;

      Cell::up('messages');
      Schema::table('messages', function (Blueprint $table) {
            $table->text('content')->nullable();
            $table->string('title');
            $table->integer('media_id')->nullable();
            $table->string('type')->default('news');
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
