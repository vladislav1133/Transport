<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @resource Countries
 */
class CountriesController extends Controller
{
    /**
     * Display all available countries
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        $countries = Country::where('available', 1)->get();

        $response['status'] = true;

        $response['data']['countries'] = $countries;

        return response()->json($response);
    }

    /**
     * Display all available cities for specified country
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCitiesByCode($code)
    {
        $country = Country::where('available', 1)->where('code', $code)->first();

        if ($country) {
            $cities = City::where('country_id', $country->id)->where('available', 1)->get();

            $response['status'] = true;
            $response['data']['cities'] = $cities;
        } else {
            $response['status'] = false;
            $response['errors'][] = 'Not Found';
        }

        return response()->json($response);
    }
}
