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
        Schema::create('Godina_Studija', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NazivSlovima');
            $table->string('NazivRimski');
            $table->string('NazivSlovimaUPadezu');
            $table->integer('RedosledPrikazivanja')->unsigned();
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
        Schema::drop('Godina_Studija');
    }
}
