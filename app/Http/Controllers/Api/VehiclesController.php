<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateBusRequest;
use App\Repositories\VehiclesRepository;
use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @resource Vehicles
 */
class VehiclesController extends Controller
{

    private $vehiclesRepository;

    public function __construct(VehiclesRepository $vehiclesRepository)
    {

        $this->vehiclesRepository = $vehiclesRepository;
        // $this->middleware('auth:api');
        //   ->except('index', 'show', 'update');
    }

    /**
     * Display a listing of the vehicles.
     */
    public function getAll()
    {
        $response['status'] = true;

        $vehicles = $this->vehiclesRepository->getAll();


        $response['data']['vehicles'] = $vehicles;

        return response()->json($response);
    }

    /**
     * Display the specified vehicle.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getById($id)
    {
        $vehicle = $this->vehiclesRepository->getById($id);

        if ($vehicle) {

            $response['status'] = true;
            $response['data']['vehicle'] = $vehicle;

        } else {
            $response['status'] = false;
            $response['errors'][] = 'Not found';
        }

        return response()->json($response);
    }


    /**
     * Update the specified vehicle.
     */
    public function updateById($id, UpdateBusRequest $request)
    {
        $vehicle = Vehicle::where('id', $id)->first();

        if ($vehicle) {
            if ($vehicle->token !== $request->token) {

                $response['status'] = false;
                $response['errors'][] = 'Forbidden access';
            } else {

                $vehicle->lon = $request->lon;
                $vehicle->lat = $request->lat;
                $vehicle->direction = $request->direction;
                $vehicle->save();

                $response['status'] = true;
                $response['payload'] = [
                    'lon' => $request->lon,
                    'lat' => $request->lat,
                    'direction' => $request->direction,
                    'token' => $request->token
                ];
            }
        } else {
            $response['status'] = false;
            $response['errors'][] = 'Not found';
        }

        return response()->json($response);
    }

}
