<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateBusRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Response;
use App\Bus;
use App\Repositories\BusesRepository;

/**
 * @resource Buses
 */
class BusesController extends Controller
{

    private $busesRepository;

    public function __construct(BusesRepository $busesRepository)
    {

        $this->busesRepository = $busesRepository;
       // $this->middleware('auth:api');
         //   ->except('index', 'show', 'update');
    }

    /**
     * Display a listing of the buses.
     */
    public function getAll()
    {
        $response['status'] = true;

        $buses = $this->busesRepository->getAll();

        $response['data']['buses'] = $buses;

        return Response::json($response);
    }

    /**
     * Display the specified bus.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getById($id)
    {
        $bus = $this->busesRepository->getById($id);

        if ($bus) {

            $response['status'] = true;
            $response['data']['bus'] = $bus;

        } else {
            $response['status'] = false;
            $response['errors'][] = 'Not found';
        }

        return response()->json($response);
    }


    /**
     * Update the specified bus.
     */
    public function updateById($id, UpdateBusRequest $request)
    {
        $bus = Bus::where('id', $id)->first();

        if($bus) {
            if ($bus->token !== $request->token) {

                $response['status'] = false;
                $response['errors'][] = 'Forbidden access';
            } else {

                $bus->lon = $request->lon;
                $bus->lat = $request->lat;
                $bus->direction = $request->direction;
                $bus->save();

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
