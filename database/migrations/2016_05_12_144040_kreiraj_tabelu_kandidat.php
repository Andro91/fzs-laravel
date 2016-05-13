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
            $table->string('ImeKandidata');
            $table->string('PrezimeKandidata');
            $table->string('JMBG');
            $table->dateTime('DatumRodjenja');
            $table->integer('ID_MestaRodjenja')->unsigned()->index();
            $table->integer('ID_KrsnaSlava')->unsigned()->index();
            $table->string('KontaktTelefon')->nullable();
            $table->string('AdresaStanovanja')->nullable();
            $table->string('Email')->nullable();
            $table->string('ImePrezimeJednogRoditelja')->nullable();
            $table->string('KontaktTelefonRoditelja')->nullable();
            $table->integer('ID_ZavrseneSkoleFakulteta')->unsigned()->index();

            $table->integer('SmerZavrseneSkoleFakulteta')->unsigned()->nullable();
            $table->integer('ID_UspehSrednjaSkola')->unsigned()->index();
            $table->integer('ID_OpstiUspehSrednjaSkola')->unsigned()->index();
            $table->decimal('SrednjaOcenaSrednjaSkola', 1, 2);
            $table->integer('ID_SportskoAngazovanje')->unsigned()->nullable();
            $table->decimal('TelesnaTezinaKandidata', 2, 2);
            $table->integer('VisinaKandidata');
            $table->integer('ID_PrilozenogDokumentaPrvaGodina')->unsigned()->nullable();
            $table->integer('ID_StatusaUpisaKandidata')->unsigned()->nullable();
            $table->decimal('BrojBodovaTest', 2, 2)->nullable();
            $table->decimal('BrojBodovaSkola', 2, 2);
            $table->string('UpisniRok')->nullable();
            $table->integer('ID_SkolskeGodineUpisa')->unsigned()->index();
            $table->integer('IndikatorAktivan')->unsigned();
            $table->integer('ID_StudijskiProgram')->unsigned()->index();
            $table->integer('ID_TipaStudija')->unsigned()->index();
            $table->integer('ID_GodinaStudija')->unsigned()->index();
            $table->integer('ID_KrsnaSlava')->unsigned()->index();
            $table->integer('ID_Mesta')->unsigned()->index();
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
        //
    }
}
