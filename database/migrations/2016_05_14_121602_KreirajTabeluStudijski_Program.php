<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajTabeluStudijskiProgram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Studijski_Program', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NazivStudijskogPrograma');
            $table->string('SkrNazivStudijskogPrograma');
            $table->integer('ID_TipaStudija')->unsigned()->index();
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
        Schema::drop('Studijski_Program');
    }
}
