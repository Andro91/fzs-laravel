<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolozeniIspitiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polozeni_ispiti', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prijava_id');
            $table->integer('zapisnik_id');
            $table->integer('kandidat_id');
            $table->integer('predmet_id');
            $table->integer('ocenaPismeni');
            $table->integer('ocenaUsmeni');
            $table->integer('konacnaOcena');
            $table->integer('statusIspita');
            $table->integer('odluka_id');
            $table->boolean('indikatorAktivan');
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
        Schema::drop('polozeni_ispiti');
    }
}
