<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajTabeluKandidatPrilozenaDokumenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Kadnidat_Prilozena_Dokumenta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ID_Prilozenog_Dokumenta')->unsigned()->index();
            $table->integer('IndikatorAktivan')->unsigned();
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
        Schema::drop('Kadnidat_Prilozena_Dokumenta');
    }
}
