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
            $table->integer('predmet_id')->nullable();
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
