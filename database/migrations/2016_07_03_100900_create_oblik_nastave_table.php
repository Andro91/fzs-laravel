<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOblikNastaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oblik_nastave', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv')->nullable();
            $table->string('skrNaziv')->nullable();
            $table->integer('indikatorAktivan')->unsigned()->nullable();
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
        Schema::drop('oblik_nastave');
    }
}
