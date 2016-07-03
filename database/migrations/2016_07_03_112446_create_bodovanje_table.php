<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodovanjeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodovanje', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('poeniMax')->nullable();
            $table->integer('poeniMin')->nullable();
            $table->integer('ocena')->nullable();
            $table->string('opisnaOcena')->nullable();
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
        //
    }
}
