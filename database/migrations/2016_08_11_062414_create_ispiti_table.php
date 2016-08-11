<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIspitiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ispiti', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('predmet_id');
            $table->integer('student_id');
            $table->integer('ispitni_rok_id');
            $table->integer('ocena');
            $table->string('godina');
            $table->integer('polozen')->unsigned();
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
        Schema::drop('ispiti');
    }
}
