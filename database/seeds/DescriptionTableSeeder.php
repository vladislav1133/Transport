<?php

use Illuminate\Database\Seeder;


use App\Description;
class DescriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Description::create([
            'type' => 'bus',
            'price' => '4.0 UAH',
            'interval' => '15-20',
            'work_time' => '7:00-21:45',
            //'carrier' => 'ПОГ ВСК "Юридическая Академия"'

        ]);
    }
}
