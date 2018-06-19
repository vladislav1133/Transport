<?php

namespace App\Repositories;

use App\City;
use App\Route;

class RoutesRepository
{
    public function getAll() {

        $routes = Route::with(["stops", "transports.vehicles"])->get();

        return $routes;
    }

    public function getById($id) {

        $route = Route::with(["stops", "transports.vehicles"])->where("id", $id)->first();

        return $route;
    }


}