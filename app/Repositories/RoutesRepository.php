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

        $route = Route::where('id', $id)->first();

        return $route;
    }
}