<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajTabeluSportskoAngazovanje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sportsko_Angazovanje', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ID_Sporta')->unsigned()->index();
            $table->integer('ID_Kandidata')->unsigned()->index();
            $table->string('NazivKluba');
            $table->string('OdDoGodina');
            $table->integer('NazivRimski')->unsigned();

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
        Schema::drop('Sportsko_Angazovanje');
    }
}
