<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiplomskiPolaganjeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diplomski_polaganje', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipStudija_id');
            $table->integer('studijskiProgram_id');
            $table->integer('kandidat_id');
            $table->integer('predmet_id');
            $table->string('nazivTeme');
            $table->date('datum');
            $table->time('vreme');
            $table->integer('profesor_id');
            $table->integer('rok_id');
            $table->integer('brojBodova')->nullable();
            $table->integer('ocena')->nullable();
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
        Schema::drop('diplomski_polaganje');
    }
}
