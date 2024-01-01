<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Schemas\Cell;

class CreateMessagesCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('messages_cards')) return;
        Cell::up('messages_cards');
        Schema::table('messages_cards', function (Blueprint $table) {

              $table->integer('card_id')->unsigned();
              $table->foreign('card_id')
              ->references('id')->on('cards');

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
        Cell::drop('messages_cards');
    }
}
