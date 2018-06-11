<?php

use App\Transport;
use Illuminate\Database\Seeder;

class TransportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transport::create([
            "type" => "bus",
            "route_id" => 1,
            "number" => 289,
            "price" => "4.0 UAH",
            "interval" => "15-20",
            "work_time" => "7:00-21:45",
        ]);
    }
}
