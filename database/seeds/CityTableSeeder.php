<?php

use Illuminate\Database\Seeder;

use App\Country;
use App\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ukraine = Country::where('code', 'UA')->first();

        City::create([
            'country_id' => $ukraine->id,
            'name' => 'Kharkiv',
            'available' => 1
        ]);
    }
}
