<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArhivIndeksaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arhiv_indeksa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('indeks');
            $table->integer('tipStudija_id');
            $table->integer('skolskaGodinaUpisa_id');
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
        Schema::drop('arhiv_indeksa');
    }
}
