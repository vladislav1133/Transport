<?php

namespace App\Http\Controllers\Api;

use App\Bus;
use App\City;
use App\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * @resource Cities
 */
class CitiesController extends Controller
{

    /**
     * Display all routes for specified city
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRoutesById($id) {
        $response['status'] = true;
        $response['data']['routes'] = [];

        $city = City::where('id', $id)->where('available', 1)->first();

        if($city) {
            $routes = Route::with('stops')->where('city_id', $city->id)->get();

            $response['data']['routes'] = $routes;
        }

        return response()->json($response);
    }

    /**
     * Display all buses for specified city
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBusesById($id) {
        $response['status'] = true;
        $response['data']['buses'] = [];

        $city = City::where('id', $id)->where('available', 1)->first();

        if($city) {
            $routesBuses = Route::with('buses')->where('city_id', $city->id)->get()
                ->pluck('buses')->toArray();

            $buses = [];

            foreach ($routesBuses as $busArray) {
                foreach ($busArray as $bus) {
                    array_push($buses, $bus);
                }
            }

            $response['data']['buses'] = $buses;
        }

        return response()->json($response);
    }
}
