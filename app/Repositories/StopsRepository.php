<?php

namespace App\Repositories;

use App\City;
use App\Route;
use App\Stop;

class StopsRepository
{
    public function getAll() {

        $stops = Stop::get();

        return $stops;
    }

    public function getById($id) {

        $stop = Stop::where("id", $id)->first();

        return $stop;
    }

}