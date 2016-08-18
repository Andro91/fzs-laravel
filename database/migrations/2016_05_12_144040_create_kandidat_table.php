<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKandidatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kandidat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imeKandidata')->nullable();
            $table->string('prezimeKandidata')->nullable();
            $table->string('jmbg')->unique();
            $table->dateTime('datumRodjenja')->nullable();
            $table->integer('mestoRodjenja_id')->unsigned()->index();
            $table->integer('krsnaSlava_id')->unsigned()->index();
            $table->string('kontaktTelefon')->nullable();
            $table->string('adresaStanovanja')->nullable();
            $table->string('email')->nullable();
            $table->string('imePrezimeJednogRoditelja')->nullable();
            $table->string('kontaktTelefonRoditelja')->nullable();
            $table->string('srednjeSkoleFakulteti')->nullable();
            $table->integer('mestoZavrseneSkoleFakulteta_id')->unsigned()->index();
            $table->string('smerZavrseneSkoleFakulteta')->nullable();
            $table->integer('uspehSrednjaSkola_id')->unsigned()->index();
            $table->integer('opstiUspehSrednjaSkola_id')->unsigned()->index();
            $table->double('srednjaOcenaSrednjaSkola')->nullable();
            $table->integer('sportskoAngazovanje_id')->unsigned()->nullable();
            $table->double('telesnaTezina')->nullable();
            $table->double('visina')->nullable();
            $table->integer('prilozenaDokumentaPrvaGodina_id')->unsigned()->nullable();
            $table->integer('statusUpisa_id')->unsigned()->nullable();
            $table->double('brojBodovaTest')->nullable();
            $table->double('brojBodovaSkola')->nullable();
            $table->double('prosecnaOcena')->nullable();
            $table->string('upisniRok')->nullable();
            $table->string('brojIndeksa')->nullable()->unique();
            $table->integer('skolskaGodinaUpisa_id')->unsigned()->index();
            $table->integer('indikatorAktivan')->unsigned();
            $table->integer('studijskiProgram_id')->unsigned()->index();
            $table->integer('tipStudija_id')->unsigned()->index();
            $table->integer('godinaStudija_id')->unsigned()->index();
            $table->integer('mesto_id')->unsigned()->index();
            $table->boolean('uplata')->default(0)->nullable();
            $table->boolean('upisan')->default(0)->nullable();
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
        Schema::drop('kandidat');
    }
}
