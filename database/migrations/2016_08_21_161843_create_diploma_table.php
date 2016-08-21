<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiplomaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diploma', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kandidat_id');
            $table->string('datumOdbrane')->nullable();
            $table->string('broj')->nullable();
            $table->string('ocenaOpis')->nullable();
            $table->double('ocenaBroj')->nullable();
            $table->string('lice')->nullable();
            $table->string('funkcija')->nullable();
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
        Schema::drop('diploma');
    }
}
