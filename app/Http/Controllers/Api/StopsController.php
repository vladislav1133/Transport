<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\GetNearestBusRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Stop;
use App\Bus;

/**
 * @resource Stops
 */
class StopsController extends Controller
{
    public function __construct()
    {

       // $this->middleware('auth:api')
       //     ->only('update');
    }

    /**
     * Display a listing of the stops.
     */
    public function getAll()
    {
        $response['status'] = true;

        $stops = Stop::get();

        $response['data']['stops'] = $stops;

        return response()->json($stops);
    }

    /**
     * Display the specified stop.
     */
    public function getById($id)
    {
        $stop = Stop::where('id', $id)->first();

        if ($stop) {
            $response['status'] = true;
            $response['data']['stop'] = $stop;
        } else {
            $response['status'] = false;
            $response['errors'][] = 'Not Found';
        }

        return response()->json($response);
    }

    /**
     * Display a nearest bus for user.
     */
    public function getNearestBus($stopId, GetNearestBusRequest $request)
    {
        $lon = $request->lon;
        $lat = $request->lat;

        $busesDistance = Stop::getBusesDistanceToUser($lon,$lat,$stopId);

        $response['status'] = true;
        $response['data']['busDistance'] = $busesDistance;
        $response['payload'] = [
            'lon' => $request->lon,
            'lat' => $request->lat
        ];

        return response()->json($response);
    }


}



