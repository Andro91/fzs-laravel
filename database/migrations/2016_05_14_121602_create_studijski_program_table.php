<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajTabeluStudijskiProgram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studijski_program', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv');
            $table->string('skrNazivStudijskogPrograma');
            $table->integer('tipStudija_id')->unsigned()->index();
            $table->integer('indikatorAktivan')->unsigned();
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
        Schema::drop('studijski_program');
    }
}
