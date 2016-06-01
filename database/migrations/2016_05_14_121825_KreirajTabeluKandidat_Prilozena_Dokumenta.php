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
        Schema::create('kandidat_prilozena_dokumenta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kandidat_id')->unsigned();
            $table->integer('prilozenaDokumenta_id')->unsigned()->index();
            $table->integer('indikatorAktivan')->unsigned();
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
        Schema::drop('kandidat_prilozena_dokumenta');
    }
}
