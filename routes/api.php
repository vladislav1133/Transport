<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// API Group Routes
Route::group(array('prefix' => 'v1', 'middleware' => []), function () {


    Route::get('buses','BusesController@index');
    Route::get('buses/{id}','BusesController@show');
  //  Route::put('buses/{id}','BusesController@update');

    Route::get('stops', 'StopsController@index');
    Route::get('stops/nearestbus/{stopId}', 'StopsController@getNearestBus');
    Route::get('stops/{id}/{relation?}', 'StopsController@show');


    Route::get('routes/','RoutesController@index');
    Route::get('routes/{id}/{relation?}','RoutesController@show');
});
