<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Schemas\Simple;
class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('phones')) return;
        Simple::up('phones');
        Schema::table('phones', function (Blueprint $table) {
                $table->integer('national')->default(84);
                $table->integer('number');//price
                $table->integer('phone');//price
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Simple::drop('phones');
    }
}
