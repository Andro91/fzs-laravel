<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredmetProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predmet_program', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('studijskiProgram_id')->nullable();
            $table->integer('godinaStudija_id')->unsigned()->index();
            $table->integer('semestar')->unsigned()->index();
            $table->integer('predmet_id')->nullable();
            $table->integer('tipPredmeta_id');
            $table->integer('tipStudija_id');
            $table->integer('espb');
            $table->integer('statusPredmeta');
            $table->integer('predavanja');
            $table->integer('vezbe');
            $table->integer('skolskaGodina_id');
            $table->integer('indikatorAktivan')->unsigned()->nullable();
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
        Schema::drop('predmet_program');
    }
}
