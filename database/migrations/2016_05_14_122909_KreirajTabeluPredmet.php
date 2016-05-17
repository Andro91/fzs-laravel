<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajTabeluPredmet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predmet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv');
            $table->integer('tipStudija_id')->unsigned()->index();
            $table->integer('studijskiProgram_id')->unsigned()->index();
            $table->integer('godinaStudija_id')->unsigned()->index();
            $table->integer('semestarSlusanjaPredmeta')->unsigned()->index();
            $table->integer('espb');
            $table->integer('statusPredmeta');
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
        Schema::drop('predmet');
    }
}
