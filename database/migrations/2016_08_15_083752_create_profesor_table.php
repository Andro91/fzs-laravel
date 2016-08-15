<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jmbg');
            $table->string('ime')->nullable();
            $table->string('prezime')->nullable();
            $table->string('telefon')->nullable();
            $table->integer('status_id')->nullable();
            $table->string('zvanje')->nullable();
            $table->string('kabinet')->nullable();
            $table->string('mail')->nullable();
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
        Schema::drop('profesor');
    }
}
