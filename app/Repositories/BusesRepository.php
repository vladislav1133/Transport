<?php

namespace App\Repositories;
use App\Bus;

class BusesRepository {

    public function getAll() {

        $buses = Bus::with(['description', 'route'])->get();

        return $buses;
    }

    public function find($id) {

        $bus = Bus::with(['description', 'route'])->where('id', $id)->first();

        return $bus;
    }
}