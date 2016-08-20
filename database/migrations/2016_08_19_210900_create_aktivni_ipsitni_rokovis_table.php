<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAktivniIpsitniRokovisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktivni_ipsitni_rokovis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rok_id');
            $table->string('naziv');
            $table->date('pocetak');
            $table->date('kraj');
            $table->integer('tipRoka_id');
            $table->string('komentar');
            $table->boolean('indikatorAktivan');
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
        Schema::drop('aktivni_ipsitni_rokovis');
    }
}
