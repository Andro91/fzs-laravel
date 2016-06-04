<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUspehSrednjaSkolaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uspeh_srednja_skola', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kandidat_id')->unsigned()->index();
            $table->integer('srednjeSkoleFakulteti_id')->unsigned()->index();
            $table->integer('opstiUspeh_id')->unsigned()->index();
            $table->double('srednja_ocena');
            $table->integer('RedniBrojRazreda');
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
        Schema::drop('uspeh_srednja_skola');
    }
}
