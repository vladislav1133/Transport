<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetNearestBusRequest;
use Illuminate\Http\Request;

use App\Stop;
use App\Bus;

/**
 * @resource Stops
 */
class StopsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:api')
            ->only('update');
    }

    /**
     * Display a listing of the stops.
     */
    public function index()
    {

        $stops = Stop::get();

        $stops = json_encode($stops, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        return response($stops);
    }

    /**
     * Display the specified stop.
     */
    public function show($id, $relation = false)
    {

        $stop = Stop::find($id);

        if ($relation) {

            if ($stop[$relation] === null) return response()->json(['status' => '400', 'message' => 'Tried accessing none existing relation'], 400);

            $stop = $stop[$relation];
        }

        $stop = json_encode($stop, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        return response($stop);
    }

    /**
     * Display the nearest bus for user.
     */
    public function getNearestBus($neededStopId, GetNearestBusRequest $request)
    {
        $lon = $request->lon;
        $lat = $request->lat;

        $busesDistance = Stop::getBusesDistanceToUser($lon,$lat,$neededStopId);

        $busesDistance = json_encode($busesDistance, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        return response($busesDistance);



    }


}



