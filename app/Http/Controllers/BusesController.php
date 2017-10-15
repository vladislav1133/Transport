<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bus;


class BusesController extends Controller {

    public function __construct(){

        $this->middleware('auth:api')
            ->except('index','show','update');
    }

    public function index() {

        $buses = Bus::with('stops', 'description')->get();

        $buses = json_encode($buses, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        return response($buses);
    }

    public function show($id, $relation = false) {

        $bus = Bus::find($id);

        if($relation) {

            if ($bus[$relation] === null)  return response()->json(['status' => '400', 'message' => 'Tried accessing nonexisting relation'], 400);

                $bus = $bus[$relation];
        }

        $bus = json_encode($bus, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        return response($bus);
    }

    public function edit($id) {

    }

    public function update(Request $request, $id) {

        $bus = Bus::findOrFail($id);

        if($bus->token !== $request->input('token')) return response()->json(['status' => '403', 'message' => 'Forbidden for save'], 403);

        $bus->lon = $request->lon;
        $bus->lat = $request->lat;


        $bus->save();

        return response()->json(['saved'=>true]);
    }

}
