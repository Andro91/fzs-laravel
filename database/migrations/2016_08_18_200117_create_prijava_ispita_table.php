<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrijavaIspitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prijava_ispita', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kandidat_id');
            $table->integer('predmet_id');
            $table->integer('profesor_id');
            $table->integer('rok_id');
            $table->integer('brojPolaganja');
            $table->date('datum');
            $table->date('datum2');
            $table->time('vreme');
            $table->integer('tipPrijave_id');
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
        Schema::drop('prijava_ispita');
    }
}
