<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajTabeluTipStudija extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tip_Studija', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NazivTipaStudija');
            $table->string('SkrNazivTipaStudija');
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
        Schema::drop('Tip_Studija');
    }
}
