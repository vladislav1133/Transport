<?php

use Illuminate\Database\Seeder;

use App\Route;
use App\Bus;

class RouteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Route::create([
            'distance' => 2.88
        ]);

        $route = Route::find(1);

        $route->stops()->attach([1,2,3,4,5,6,7]);

    }
}
