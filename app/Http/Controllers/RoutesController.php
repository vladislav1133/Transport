<?php

namespace App\Http\Controllers;

use App\Route;
use Illuminate\Http\Request;

class RoutesController extends Controller
{

    public function __construct(){

        $this->middleware('auth:api')
            ->except('index','show','update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $routes = Route::with('stops')->get();

        $routes = json_encode($routes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        return response($routes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
