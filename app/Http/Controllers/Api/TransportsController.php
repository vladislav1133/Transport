<?php

namespace App\Http\Controllers\Api;

use App\Repositories\TransportsRepository;
use App\Transport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @resource Transports
 */
class TransportsController extends Controller
{
    private $transportsRepository;

    public function __construct(TransportsRepository $transportsRepository)
    {

        $this->transportsRepository = $transportsRepository;
    }

    /**
     * Display a listing of the transports.
     */
    public function getAll()
    {
        $response['status'] = true;
        $response['code'] = 200;

        $response['data']['transports'] = $this->transportsRepository->getAll();

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
        $response['status'] = true;
        $response['code'] = 200;

        $transport = $this->getById($id);

        if ($transport) {

            $response['data']['transport'] = $transport;

        } else {
            $response['status'] = false;
            $response['code'] = 404;
            $response['errors'][] = 'Transports not found';
        }

        return response()->json($response);
    }

}
