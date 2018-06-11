<?php

namespace App\Http\Controllers\Api;

use App\Repositories\RoutesRepository;
use App\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @resource Routes
 */
class RoutesController extends Controller
{
    private $routesRepository;

    public function __construct(RoutesRepository $routesRepository)
    {

        $this->routesRepository = $routesRepository;
    }

    /**
     * Display a listing of the routes.
     */
    public function getAll()
    {
        $response["status"] = true;
        $response["code"] = 200;

        $routes = $this->routesRepository->getAll();

        $response["data"]["routes"] = $routes;

        return response()->json($response);
    }

    /**
     * Display the specified route
     */
    public function getById($id) {
        $response["status"] = true;
        $response["code"] = 200;

        $route = $this->routesRepository->getById($id);

        if($route) {

            $response["data"]["route"] = $route;
        } else {

            $response["status"] = false;
            $response["errors"][] = "Route not found";
        }

        return response()->json($response);
    }
}
