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
    public function getRoutesById($id)
    {
        $response['status'] = true;
        $response['data']['routes'] = [];

        $city = City::where('id', $id)->where('available', 1)->first();

        if ($city) {
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
    public function getTransportsById($id)
    {
        $response['status'] = true;
        $response['data']['transports'] = [];

        $city = City::where('id', $id)->where('available', 1)->first();

        if ($city) {
            $routesTransports = Route::with('transports')->where('city_id', $city->id)->get()
                ->pluck('transports')->toArray();

            $response['data']['transports'] = $routesTransports;
        }

        return response()->json($response);
    }
}
