<?php

namespace App\Repositories;
use App\Vehicle;

class VehiclesRepository {

    public function getAll() {

        $vehicles = Vehicle::get();

        return $vehicles;
    }

    public function getById($id) {

        $vehicles = Vehicle::where("id", $id)->first();

        return $vehicles;
    }


    public function updatePosition($vehicle, $request) {

        $vehicle->lon = $request->lon;
        $vehicle->lat = $request->lat;
        $vehicle->direction = $request->direction;
        $vehicle->available = $request->available;
        return $vehicle->save();
    }
}