<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUplataSkolarineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uplata_skolarine', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skolarina_id');
            $table->integer('kandidat_id');
            $table->double('iznos');
            $table->string('naziv')->nullable();
            $table->date('datum');
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
        Schema::drop('uplata_skolarine');
    }
}
