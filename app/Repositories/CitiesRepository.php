<?php
/**
 * Created by PhpStorm.
 * User: vladislav
 * Date: 06.06.18
 * Time: 15:56
 */

namespace App\Repositories;

use App\City;
use App\Route;

class CitiesRepository
{
    public function getAll() {

        $cities = City::get();

        return $cities;
    }

    public function getById($id) {

        $city = City::where("id", $id)->where("available", 1)->first();

        return $city;
    }

    public function getRoutesById($id) {

        $routes = [];

        $city = $this->getById($id);

        if ($city) {
            $routes = Route::with("stops")->where("city_id", $city->id)->get();
        }

        return $routes;
    }

    public function getTransportsById($id) {

        $transports = [];

        $city = $this->getById($id);

        if ($city) {
            $transports = Route::with("transports")->where("city_id", $city->id)->get()
                ->pluck("transports")->toArray();
        }

        return $transports;

    }
}