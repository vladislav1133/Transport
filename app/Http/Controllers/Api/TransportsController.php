<?php

namespace App\Http\Controllers\Api;

use App\Transport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @resource Transports
 */
class TransportsController extends Controller
{

    /**
     * Display a listing of the transports.
     */
    public function getAll()
    {
        $response['status'] = true;

      //  $vehicles = $this->vehiclesRepository->getAll();


        $response['data']['transports'] = Transport::with(['vehicles'])->get();

        return response()->json($response);
    }

    /**
     * Display the specified transport.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getById($id)
    {
        $transport = Transport::with(['vehicles'])->where('id', $id)->first();

        if ($transport) {

            $response['status'] = true;
            $response['data']['transport'] = $transport;

        } else {
            $response['status'] = false;
            $response['errors'][] = 'Not found';
        }

        return response()->json($response);
    }

}
