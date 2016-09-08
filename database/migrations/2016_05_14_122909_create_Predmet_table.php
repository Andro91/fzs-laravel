<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredmetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predmet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv');
            $table->integer('espb');
            $table->integer('tipPredmeta_id');
            $table->integer('statusPredmeta');
            $table->integer('predavanja');
            $table->integer('vezbe');
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
        Schema::drop('predmet');
    }
}
