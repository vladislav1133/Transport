<?php

use Illuminate\Database\Seeder;

use App\Bus;
use App\Stop;

class BusStopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $bus = Bus::find(1);


            $bus->stops()->attach([1,2,3,4,5,6,7]);
    }
}
