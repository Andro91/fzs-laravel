<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrijavaIspitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prijava_ispitas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kandidat_id');
            $table->integer('predmet_id');
            $table->integer('profesor_id');
            $table->integer('rok_id');
            $table->integer('brojPolaganja');
            $table->date('datum');
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
        Schema::drop('prijava_ispitas');
    }
}
