<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        \Illuminate\Database\Eloquent\Model::unguard();

        // $this->call(KrsnaSlavaSeeder::class);
        //$this->call(MestoSeeder::class);
        $this->call(PredmetSeeder::class);
        $this->call(SportSeeder::class);
        //$this->call(SrednjeSkoleFakultetiSeeder::class);
        $this->call(StatusStudiranjaSeeder::class);
        $this->call(StudijskiProgramSeeder::class);
        $this->call(TipStudijaSeeder::class);
        $this->call(PrilozenaDokumentaSeeder::class);
        $this->call(OpstiUspehSeeder::class);
        // $this->call(RegionSeeder::class);
        $this->call(SkolskaGodinaSeeder::class);
        $this->call(GodinaStudijaSeeder::class);
        $this->call(SemestarSeeder::class);
        $this->call(IspitniRokSeeder::class);
        $this->call(OblikNastaveSeeder::class);
        $this->call(TipPredmetaSeeder::class);
        $this->call(BodovanjeSeeder::class);
        $this->call(StatusKandidataSeeder::class);
        $this->call(StatusIspitaSeeder::class);
        $this->call(TipSemestraSeeder::class);
        $this->call(StatusProfesoraSeeder::class);
        $this->call(TipPrijaveSeeder::class);
    }
}
