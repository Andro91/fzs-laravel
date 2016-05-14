<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajTabeluPredmet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Predmet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ID_TipStudija')->unsigned()->index();
            $table->integer('ID_StudijskogPrograma')->unsigned()->index();
            $table->integer('ID_GodinaStudija')->unsigned()->index();
            $table->integer('ID_SemestarSlusanjaPredmeta')->unsigned()->index();
            $table->integer('ESPB');
            $table->integer('StatusPredmeta');
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
        Schema::drop('Predmet');
    }
}
