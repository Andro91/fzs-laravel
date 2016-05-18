<?php

use Illuminate\Database\Seeder;

class SportskoAngazovanjeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sportskoAngazovanje = new \App\SportskoAngazovanje();

        $sportskoAngazovanje->nazivKluba = str_random(10);
        $sportskoAngazovanje->odDoGodina = str_random(10);
        $sportskoAngazovanje->ukupnoGodina = 5;
        $sportskoAngazovanje->sport_id = 2;
        $sportskoAngazovanje->kandidat_id = 1;

        $sportskoAngazovanje->save();
    }
}
