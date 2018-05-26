<?php

use Illuminate\Database\Seeder;

use App\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = Config::get('countries');

        foreach ($countries as $code => $name) {

            $available = ($code === 'UA') ? 1 : 0;

            Country::create([
                'code' => $code,
                'name' => $name,
                'available' => $available
            ]);
        }
    }
}
