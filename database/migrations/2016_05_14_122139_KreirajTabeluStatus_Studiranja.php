<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajTabeluStatusStudiranja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Status_Studiranja', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NazivStatusaStudiranja');
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
        Schema::drop('Status_Studiranja');
    }
}
