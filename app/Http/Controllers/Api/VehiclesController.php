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
    }

    /**
     * Display a listing of the vehicles.
     */
    public function getAll()
    {
        $response['status'] = true;
        $response['code'] = 200;

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
        $response['status'] = true;
        $response['status'] = 200;

        $vehicle = $this->vehiclesRepository->getById($id);

        if ($vehicle) {

            $response['data']['vehicle'] = $vehicle;

        } else {
            $response['status'] = false;
            $response['code'] = 404;
            $response['errors'][] = 'Vehicle not found';
        }

        return response()->json($response);
    }


    /**
     * Update the specified vehicle.
     *
     * @param $id
     * @param UpdateBusRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateById($id, UpdateBusRequest $request)//
    {
        $response['status'] = true;
        $response['payload'] = $request->all();

        $vehicle = $this->vehiclesRepository->getById($id);

        if ($vehicle) {

            if ($vehicle->token !== $request->token) {

                $response['status'] = false;
                $response['code'] = 403;
                $response['errors'][] = 'Forbidden access';
            } else {


                $this->vehiclesRepository->updatePosition($vehicle, $request);
            }
        } else {

            $response['status'] = false;
            $response['code'] = 404;
            $response['errors'][] = 'Vehicle not found';
        }

        return response()->json($response);
    }

}
