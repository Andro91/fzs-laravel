<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipPredmetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tip_predmeta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv')->nullable();
            $table->string('skrNaziv')->nullable();
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
        Schema::drop('tip_predmeta');
    }
}
