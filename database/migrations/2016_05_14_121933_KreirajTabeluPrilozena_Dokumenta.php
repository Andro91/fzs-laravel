<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajTabeluPrilozenaDokumenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Prilozena_Dokumenta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('IndGodina');
            $table->string('NazivDokumenta');
            $table->integer('RedniBrojDokumenta')->unsigned();
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
        Schema::drop('Prilozena_Dokumenta');
    }
}
