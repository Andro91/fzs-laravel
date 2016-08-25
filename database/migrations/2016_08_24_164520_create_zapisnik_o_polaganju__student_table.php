<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZapisnikOPolaganjuStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zapisnik_o_polaganju__student', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('zapisnik_id');
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
        Schema::drop('zapisnik_o_polaganju__student');
    }
}
