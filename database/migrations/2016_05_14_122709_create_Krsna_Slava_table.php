<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKrsnaSlavaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krsna_slava', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv');
            $table->dateTime('datumSlave');
            $table->integer('indikatorAktivan');
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
        Schema::drop('krsna_slava');
    }
}
