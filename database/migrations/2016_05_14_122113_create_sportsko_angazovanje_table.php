<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportskoAngazovanjeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sportsko_angazovanje', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sport_id')->unsigned()->index();
            $table->integer('kandidat_id')->unsigned()->index();
            $table->string('nazivKluba');
            $table->string('odDoGodina');
            $table->integer('ukupnoGodina')->unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sportsko_angazovanje');
    }
}
