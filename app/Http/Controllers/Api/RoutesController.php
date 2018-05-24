<?php

namespace App\Http\Controllers\Api;

use App\Route;
use Illuminate\Http\Request;

/**
 * @resource Routes
 */
class RoutesController extends Controller
{

    public function __construct(){

        $this->middleware('auth:api')
            ->except('index','show','update');
    }

    /**
     * Display a listing of the routes.
     */
    public function index()
    {

        $routes = Route::with('stops')->get();

        $routes = json_encode($routes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        return response($routes);
    }



    /**
     * Display the specified route
     */

    public function show($id, $relation = false) {

        $route = Route::find($id);

        if($relation) {

            if ($route[$relation] === null)  return response()->json(['status' => '400', 'message' => 'Tried accessing none existing relation'], 400);

            $route = $route[$relation];
        }
        $route = json_encode($route, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        return response($route);
    }

    public function getRouteByCountryCode() {

    }

    public function getRouteByCityId() {

    }


}
