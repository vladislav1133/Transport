<?php

namespace App\Repositories;
use App\Vehicle;

class VehiclesRepository {

    public function getAll() {

        $vehicles = Vehicle::get();

        return $vehicles;
    }

    public function getById($id) {

        $vehicles = Vehicle::where('id', $id)->first();

        return $vehicles;
    }
}