<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBusRequest;
use Illuminate\Http\Request;

use App\Bus;

/**
 * @resource Buses
 */
class BusesController extends Controller {

    public function __construct(){

        $this->middleware('auth:api')
            ->except('index','show','update');
    }

    /**
     * Display a listing of the buses.
     */
    public function index() {

        $buses = Bus::get();

        $buses = json_encode($buses, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        return response($buses);
    }

    /**
     * Display the specified bus.
     */
    public function show($id, $relation = '') {

        $bus = Bus::find($id);

        if($relation) {

            if ($bus[$relation] === null)  return response()->json(['status' => '400', 'message' => 'Tried accessing none existing relation'], 400);

                $bus = $bus[$relation];
        }
        $bus = json_encode($bus, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        return response($bus);
    }


    /**
     * Update the specified bus.
     */
    public function update($id, UpdateBusRequest $request) {


        $bus = Bus::findOrFail($id);

        if($bus->token !== $request->token) return response()->json(['status' => '403', 'message' => 'Forbidden for save'], 403);

        $bus->lon = $request->lon;
        $bus->lat = $request->lat;
        $bus->direction = $request->direction;


        $bus->save();

        return response()->json(['saved'=>true]);
    }

}
