<?php

use Illuminate\Database\Seeder;

class GodinaStudijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $godine = array('1','2','3','4');

        foreach ($godine as $g) {
            $godina = new \App\GodinaStudija();

            $godina->naziv = $g;

            $godina->save();
        }
    }
}
