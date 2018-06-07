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

    public function getByCode($code) {

        $country = Country::where('code', $code)->first();

        return $country;
    }
    public function getCitiesByCode($code) {

        $cities = [];

        $country = Country::where('code', $code)->first();

        if($country) {

            $cities = City::where('country_id', $country->id)->get();
        }

        return $cities;
    }


}