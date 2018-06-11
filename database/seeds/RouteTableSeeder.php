<?php

use Illuminate\Database\Seeder;

use App\Route;
use App\Bus;
use App\City;
class RouteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $city = City::where("name", "Kharkiv")->first();

        Route::create([
            "distance" => 2.88,
            "city_id" => $city->id
        ]);

        $route = Route::find(1);

        $route->stops()->attach([1,2,3,4,5,6,7]);

    }
}
