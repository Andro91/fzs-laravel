<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajTabeluGodinaStudija extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('godina_studija', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv');
            $table->string('nazivRimski');
            $table->string('nazivSlovimaUPadezu');
            $table->integer('redosledPrikazivanja')->unsigned();
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
        Schema::drop('godina_studija');
    }
}
