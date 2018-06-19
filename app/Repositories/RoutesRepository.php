<?php

namespace App\Repositories;

use App\City;
use App\Route;

class RoutesRepository
{
    public function getAll() {

        $routes = Route::with(["stops", "transports.vehicles", "transports.type"])->get()->toArray();

        foreach ($routes as &$route) {
            foreach ($route['transports'] as $transport) {

                $transport['type'] = $transport['type']['type'];
            }
        }

        return $routes;
    }

    public function getById($id) {

        $route = Route::with(["stops", "transports.vehicles", "transports.type"])->where("id", $id)->first()->toArray();

        foreach ($route['transports'] as &$transport) {

            $transport['type'] = $transport['type']['type'];
        }
        return $route;
    }


}