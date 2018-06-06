<?php

namespace App\Repositories;

use App\City;
use App\Country;
use App\Http\Sections\Countries;
use App\Route;

class CountriesRepository
{
    public function getAll() {

        $countries = Country::where('available', 1)->get();

        return $countries;
    }

    public function getById($id) {

        $route = Route::with('stops')->where('id', $id)->first();

        return $route;
    }
}