<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZapisnikOPolaganjuIspitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zapisnik_o_polaganju_ispita', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('predmet_id');
            $table->integer('rok_id');
            $table->integer('prijavaIspita_id');
            $table->date('datum');
            $table->time('vreme');
            $table->string('ucionica');
            $table->integer('profesor_id');
            $table->integer('kandidat_id');
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
        Schema::drop('zapisnik_o_polaganju_ispita');
    }
}
