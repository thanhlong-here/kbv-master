<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Schemas\Simple;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(Schema::hasTable('members')) return;
      Simple::up('members');
      Schema::table('members', function (Blueprint $table) {
          $table->integer('card_id');
          $table->integer('accumulate');
          $table->integer('redeempoint');

          $table->string('code')->nullable();
          $table->string('address')->nullable();
          $table->string('email')->nullable();
          $table->string('phone')->nullable();

          $table->string('work')->nullable();
          $table->string('job')->nullable();
          $table->integer('area')->nullable();

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
          Simple::drop('members');
    }
}
