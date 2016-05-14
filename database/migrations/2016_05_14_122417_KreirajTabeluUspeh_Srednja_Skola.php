<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajTabeluUspehSrednjaSkola extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Uspeh_Srednja_Skola', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ID_Kandidata')->unsigned()->index();
            $table->integer('ID_SkoleFakulteta')->unsigned()->index();
            $table->integer('ID_OpstiUspeh')->unsigned()->index();
            $table->integer('RedniBrojRazreda');
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
        Schema::drop('Uspeh_Srednja_Skola');
    }
}
