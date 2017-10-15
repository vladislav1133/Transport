<?php

use Illuminate\Database\Seeder;

use App\Stop;

class StopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Stop::create([
            'name' => 'м. Пушкинская 2',
            'lat' => 50.004178,
            'lon' => 36.247834,
        ]);

        Stop::create([
            'name' => 'ул. Студенческая',
            'lat' => 50.00744,
            'lon' => 36.251998,
        ]);

        Stop::create([
            'name' => 'спуск Журавлёвский',
            'lat' => 50.010589,
            'lon' => 36.254763,
        ]);

        Stop::create([
            'name' => 'Спорткомплекс',
            'lat' => 50.015822,
            'lon' => 36.259777,
        ]);

        Stop::create([
            'name' => 'Институт прокуратуры',
            'lat' => 50.018403,
            'lon' => 36.2639,
        ]);

        Stop::create([
            'name' => 'Факультет Мехатроники ТС ХНАДУ',
            'lat' => 50.019612,
            'lon' => 36.266584,
        ]);

        Stop::create([
            'name' => '13-е городское кладбище',
            'lat' => 50.020892,
            'lon' => 36.270597,
        ]);
    }
}
