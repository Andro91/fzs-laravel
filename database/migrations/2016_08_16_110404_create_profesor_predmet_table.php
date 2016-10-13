<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorPredmetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesor_predmet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profesor_id')->nullable();
            $table->integer('predmet_id')->nullable();//id predmet_program
            $table->integer('oblik_nastave_id')->nullable();
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
        Schema::drop('profesor_predmet');
    }
}
