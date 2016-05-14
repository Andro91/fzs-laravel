<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajTabeluSkolskaGodUpisa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Skolska_God_Upisa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NazivSkolskeGodineUpisa');
            $table->integer('IndikatorAktivan')->unsigned();
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
        Schema::drop('Skolska_God_Upisa');
    }
}
