<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KreirajTabeluKandidat extends Migration
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
            $table->string('imeKandidata');
            $table->string('prezimeKandidata');
            $table->string('jmbg')->unique();
            $table->dateTime('datumRodjenja');
            $table->integer('mestoRodjenja_id')->unsigned()->index();
            $table->integer('krsnaSlava_id')->unsigned()->index();
            $table->string('kontaktTelefon')->nullable();
            $table->string('adresaStanovanja')->nullable();
            $table->string('email')->nullable();
            $table->string('imePrezimeJednogRoditelja')->nullable();
            $table->string('kontaktTelefonRoditelja')->nullable();
            $table->integer('srednjeSkoleFakulteti_id')->unsigned()->index();
            $table->integer('mestoZavrseneSkoleFakulteta_id')->unsigned()->index();
            $table->integer('smerZavrseneSkoleFakulteta')->unsigned()->nullable();
            $table->integer('uspehSrednjaSkola_id')->unsigned()->index();
            $table->integer('opstiUspehSrednjaSkola_id')->unsigned()->index();
            $table->double('srednjaOcenaSrednjaSkola', 2, 2);
            $table->integer('sportskoAngazovanje_id')->unsigned()->nullable();
            $table->double('telesnaTezina', 2, 2);
            $table->double('visina', 2, 2);
            $table->integer('prilozenaDokumentaPrvaGodina_id')->unsigned()->nullable();
            $table->integer('statusUpisa_id')->unsigned()->nullable();
            $table->double('brojBodovaTest', 2, 2)->nullable();
            $table->double('brojBodovaSkola', 2, 2);
            $table->string('upisniRok')->nullable();
            $table->integer('skolskaGodinaUpisa_id')->unsigned()->index();
            $table->integer('indikatorAktivan')->unsigned();
            $table->integer('studijskiProgram_id')->unsigned()->index();
            $table->integer('tipStudija_id')->unsigned()->index();
            $table->integer('godinaStudija_id')->unsigned()->index();
            $table->integer('mesto_id')->unsigned()->index();
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
