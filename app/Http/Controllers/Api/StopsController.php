<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\GetNearestBusRequest;
use App\Repositories\StopsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Stop;
use App\Bus;

/**
 * @resource Stops
 */
class StopsController extends Controller
{
    private $stopsRepository;

    public function __construct(StopsRepository $stopsRepository)
    {

        $this->stopsRepository = $stopsRepository;
    }

    /**
     * Display a listing of the stops.
     */
    public function getAll()
    {
        $response["status"] = true;
        $response["code"] = 200;

        $stops = $this->stopsRepository->getAll();

        $response["data"]["stops"] = $stops;

        return response()->json($response);
    }

    /**
     * Display the specified stop.
     */
    public function getById($id)
    {
        $response["status"] = true;
        $response["code"] = 200;

        $stop = $this->stopsRepository->getById($id);

        if ($stop) {

            $response["data"]["stop"] = $stop;
        } else {
            $response["status"] = false;
            $response["errors"][] = "Stop not Found";
        }

        return response()->json($response);
    }

    /**
     * Display a nearest bus for user.
     *
     * @param GetNearestBusRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNearestBus($stopId, GetNearestBusRequest $request) //
    {
        $response["status"] = true;
        $response["code"] = 200;
        $response["payload"] = $request->all();

        $busesDistance = $this->stopsRepository->getNearestVehicleToUser(["lon" => $request->lon, "lat" => $request->lat], $stopId);

        $response["data"]["busDistance"] = $busesDistance;


        return response()->json($response);
    }
}



