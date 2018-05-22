<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBusRequest;
use Illuminate\Http\Request;

use Response;
use App\Bus;
use App\Repositories\BusesRepository;

/**
 * @resource Buses
 */
class BusesController extends Controller {

    private $busesRepository;

    public function __construct(BusesRepository $busesRepository){

        $this->busesRepository = $busesRepository;
        $this->middleware('auth:api')
            ->except('index','show','update');
    }

    /**
     * Display a listing of the buses.
     */
    public function index() {

        $buses = $this->busesRepository->getAll();

        $response['status'] = true;

        $response['data']['buses'] = $buses;

        return Response::json($response);
    }

    /**
     * Display the specified bus.
     */
    public function show($id) {

        $bus = $this->busesRepository->find($id);


        if ($bus) {

            $response['status'] = true;
            $response['data']['bus'] = $bus;

        } else {
          $response['status'] = false;
          $response['error'][] = 'Not found';
        }


        return Response::json($response);
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
