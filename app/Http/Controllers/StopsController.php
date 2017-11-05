<?php

namespace App\Http\Controllers;

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
    public function getNearestBus($neededStopId, Request $request)
    {


        $lon = 36.25476300;//3
        $lat = 50.01058900;

       // $busesDistance = Stop::getBusesDistanceToUser($lon,$lat,$neededStopId);

       // dd('end');

        return '';

        $toStop = Bus::find($id)->toArray();


        $stops = Stop::get()->toArray();

        $nearestStop = Stop::getNearestStop($lon, $lat, $stops);

        //dd($nearestStop);

        $qq = Stop::getNearestBus($nearestStop, $toStop);

        //dd(Stop::getDistance(50.00417800,36.24783400,50.02089200,36.27059700,2));


        // dd($stops);


        $toStop = Stop::find(1)->toArray();

        $bus = Bus::find(1)->toArray();

        // dd($bus);

       // dd($toStop);

        //dd($nearestStop);

        //$lon = $request->lon;
        //$lat = $request->lat;

        $nearestStop = 1;


        $buses = Bus::find(1);

        $selectStopLon = 36.27059700;
        $selectStopLat = 50.02089200;

        //  $path = round($this->distance($user['lat'], $user['lon'], $selectStopLat, $selectStopLon),2);


        //dd($buses);
    }


}


//1 Get a buses on that route
//2 get nearest

