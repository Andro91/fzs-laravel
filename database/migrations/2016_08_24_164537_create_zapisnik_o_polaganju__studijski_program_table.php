<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZapisnikOPolaganjuStudijskiProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zapisnik_o_polaganju__studijski_program', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zapisnik_id');
            $table->integer('StudijskiProgram_id');
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
        Schema::drop('zapisnik_o_polaganju__studijski_program');
    }
}
