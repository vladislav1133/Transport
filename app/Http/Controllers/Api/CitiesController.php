<?php

namespace App\Http\Controllers\Api;

use App\Bus;
use App\City;
use App\Repositories\CitiesRepository;
use App\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @resource Cities
 */
class CitiesController extends Controller
{
    private $citiesRepository;

    public function __construct(CitiesRepository $citiesRepository)
    {

        $this->citiesRepository = $citiesRepository;
    }

    /**
     * Display all routes for specified city
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRoutesById($id)
    {
        $response['status'] = true;

        $routes = $this->citiesRepository->getRoutesById($id);

        $response['data']['routes'] = $routes;


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

        $transports = $this->citiesRepository->getTransportsById($id);

        $response['data']['transports'] = $transports;

        return response()->json($response);
    }
}
