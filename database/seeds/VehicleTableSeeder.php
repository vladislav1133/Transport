<?php

use App\Vehicle;
use Illuminate\Database\Seeder;

class VehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::truncate();

        Vehicle::create([
            "transport_id" => 1,
            "lat" => 50.004178,
            "lon" => 36.247834,
            "direction" => 1,
            "available" => 1,
            "token" => "a5J5D7P5ytMraoClhIyysUkmYZJgh5wz9toqakQF268uT4ofyjOzliDk3ZLL"
        ]);

        Vehicle::create([
            "transport_id" => 1,
            "lat" => 50.010589,
            "lon" => 36.254763,
            "direction" => 1,
            "available" => 1,
            "token" => "dvle6fglgdo4fddfdgftygLUWlslZJgh5wz9toqakQF268uT4ofyjOzliDkd"
        ]);

        Vehicle::create([
            "transport_id" => 1,
            "lat" => 50.019612,
            "lon" => 36.266584,
            "direction" => 0,
            "available" => 1,
            "token" => "h6le6fglgdo4fddfdgftygLUWlslZJgh5wz9toqakQF268uT4gfl5fkrert"
        ]);

    }
}
