<?php

use Illuminate\Database\Seeder;

class SkolskaGodinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skolskeGodine = array('2016/2017','2017/2018','2018/2019');

        foreach ($skolskeGodine as $godina) {
            $skolskaGodina = new \App\SkolskaGodUpisa();

            $skolskaGodina->naziv = $godina;
            $skolskaGodina->indikatorAktivan = $godina;

            $skolskaGodina->save();
        }

    }
}
