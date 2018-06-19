<?php

use App\TransportType;
use Illuminate\Database\Seeder;

class TransportTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransportType::create([
            'type' => 'bus'
        ]);
    }
}
