<?php

namespace App\Repositories;

use App\City;
use App\Route;

class RoutesRepository
{
    public function getAll() {

        $routes = Route::with('stops')->get();

        return $routes;
    }

    public function getById($id) {

        $vehicles = City::where('id', $id)->where('available', 1)->first();

        return $vehicles;
    }
}