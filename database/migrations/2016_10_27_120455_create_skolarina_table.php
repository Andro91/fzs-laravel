<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkolarinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skolarina', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kandidat_id');
            $table->double('iznos');
            $table->string('komentar');
            $table->integer('godinaStudija_id');
            $table->integer('tipStudija_id');
            $table->integer('studijskiProgram_id');
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
        Schema::drop('skolarina');
    }
}
