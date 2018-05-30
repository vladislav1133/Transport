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


    Route::get('vehicles',     'Api\VehiclesController@getAll');
    Route::get('vehicles/{id}','Api\VehiclesController@getById');
    Route::put('vehicles/{id}','Api\VehiclesController@updateById');

    Route::get('transports','Api\TransportsController@getAll');
    Route::get('transports/{id}','Api\TransportsController@getById');


    Route::get('stops', 'Api\StopsController@getAll');
    Route::get('stops/nearestbus/{stopId}', 'Api\StopsController@getNearestBus');
    Route::get('stops/{id}', 'Api\StopsController@getById');


    Route::get('routes/','Api\RoutesController@getAll');
    Route::get('routes/{id}','Api\RoutesController@getById');


    Route::get('countries', 'Api\CountriesController@getAll');
    Route::get('countries/{code}/cities', 'Api\CountriesController@getCitiesByCode');

    Route::get('cities/{id}/transports', 'Api\CitiesController@getTransportsById');
    Route::get('cities/{id}/routes', 'Api\CitiesController@getRoutesById');

});


// routes

// bus 2

// stops 3

// routes 3

//city 2

//country 2