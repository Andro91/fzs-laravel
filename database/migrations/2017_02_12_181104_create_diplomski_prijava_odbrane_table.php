<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiplomskiPrijavaOdbraneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diplomski_prijava_odbrane', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipStudija_id');
            $table->integer('studijskiProgram_id');
            $table->integer('kandidat_id');
            $table->integer('predmet_id');
            $table->string('nazivTeme');
            $table->date('datumPrijave');
            $table->date('datumOdbrane');
            $table->integer('temu_odobrio_profesor_id');
            $table->integer('odbranu_odobrio_profesor_id');
            $table->boolean('indikatorOdobreno');
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
        Schema::drop('diplomski_prijava_odbrane');
    }
}
