<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Schemas\Cell;

class CreateMessagesMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('messages_members')) return;
        Cell::up('messages_members');
        Schema::table('messages_members', function (Blueprint $table) {

              $table->integer('member_id')->unsigned();
              $table->foreign('member_id')
              ->references('id')->on('members');

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
        Cell::drop('messages_members');
    }
}
