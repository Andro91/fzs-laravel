<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajTabeluSrednjeSkoleFakulteti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('srednje_skole_fakulteti', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv');
            $table->integer('indSkoleFakulteta');
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
        Schema::drop('srednje_skole_fakulteti');
    }
}
