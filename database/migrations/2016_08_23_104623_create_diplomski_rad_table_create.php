<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiplomskiRadTableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diplomski_rad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv')->nullable();
            $table->integer('kandidat_id')->nullable();
            $table->integer('predmet_id')->nullable();
            $table->integer('mentor_id')->nullable();
            $table->integer('predsednik_id')->nullable();
            $table->integer('clan_id')->nullable();
            $table->string('ocenaOpis')->nullable();
            $table->double('ocenaBroj')->nullable();
            $table->dateTime('datumPrijave')->nullable();
            $table->dateTime('datumOdbrane')->nullable();
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
        Schema::drop('diplomski_rad');
    }
}
