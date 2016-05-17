<?php

use Illuminate\Database\Seeder;
use App\Sport;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sport = new Sport();

        $sport->naziv = str_random(10);
        $sport->indikatorAktivan = 1;

        $sport->save();
    }
}
