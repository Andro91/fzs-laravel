<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajTabeluKrsnaSlava extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Krsna_Slava', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NazivSlave');
            $table->dateTime('DatumSlave');
            $table->integer('IndikatorAktivan');
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
        Schema::drop('Krsna_Slava');
    }
}
