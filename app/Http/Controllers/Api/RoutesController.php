<?php

namespace App\Http\Controllers\Api;

use App\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @resource Routes
 */
class RoutesController extends Controller
{

    public function __construct(){

      //  $this->middleware('auth:api')
        //    ->except('index','show','update');
    }

    /**
     * Display a listing of the routes.
     */
    public function getAll()
    {
        $response['status'] = true;

        $routes = Route::with('stops')->get();

        $response['data']['routes'] = $routes;

        return response()->json($response);
    }



    /**
     * Display the specified route
     */
    public function getById($id) {

        $route = Route::with('stops')->where('id', $id)->first();

        if($route) {
            $response['status'] = true;
            $response['data']['route'] = $route;
        } else {
            $response['status'] = false;
            $response['errors'][] = 'Not found';
        }

        return response()->json($route);
    }
}
