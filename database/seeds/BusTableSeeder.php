<?php

use Illuminate\Database\Seeder;

use App\Bus;
use App\Route;

class BusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bus::truncate();

        Bus::create([
            'number' => 289,
            'description_id' => 1,
            'route_id' => 1,
            'lon' => 36.3269748,
            'lat' => 49.9945519,
            'direction' => 1,
            'token' => 'a5J5D7P5ytMraoClhIyysUkmYZJgh5wz9toqakQF268uT4ofyjOzliDk3ZLL'
        ]);


    }
}
