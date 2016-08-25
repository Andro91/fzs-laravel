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
            $table->integer('kandidat_id');
            $table->integer('predmet_id');
            $table->integer('mentor_id');
            $table->integer('predsednik_id');
            $table->integer('clan_id');
            $table->string('ocenaOpis')->nullable();
            $table->double('ocenaBroj')->nullable();
            $table->string('datumPrijave')->nullable();
            $table->string('datumOdbrane')->nullable();
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
