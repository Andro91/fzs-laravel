<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemestarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semestar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv');
            $table->string('nazivRimski');
            $table->integer('nazivBrojcano');
            $table->integer('indikatorAktivan')->unsigned();
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
        Schema::drop('semestar');
    }
}
