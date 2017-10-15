<?php

use Illuminate\Database\Seeder;

use App\Bus;
use App\Description;

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
            'lon' => 36.3269748,
            'lat' => 49.9945519,
            'token' => str_random(60)
        ]);

        Description::create([
            'bus_id' => '1',
            'start' => 'ст. м. Пушкинская',
            'end' => 'Городское кладбище №13',
            'price' => '4.0 UAH',
            'distance' => '2.88 км',
            'interval' => '15 - 20 мин',
            'work_time' => '7:00 - 21:45',
            'carrier' => 'ПОГ ВСК "Юридическая Академия"'

        ]);

    }
}
