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
        Schema::create('Srednje_Skole_Fakulteti', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NazivSkoleFakulteta');
            $table->integer('IndSkoleFakulteta');
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
        Schema::drop('Srednje_Skole_Fakulteti');
    }
}
