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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('buses','BusesController@index');
Route::get('buses/{id}/{relation?}','BusesController@show');
Route::put('buses/{id}','BusesController@update');

Route::resource('stops','StopsController');
Route::get('stops/nearestbus/{stopId}', 'StopsController@getNearestBus');
Route::get('stops/{id}/{relation?}', 'StopsController@show');

Route::resource('routes','RoutesController');
Route::get('routes/{id}/{relation?}','RoutesController@show');

//Route::put('buses/{id}','BusesController@update');


//Route::get('buses/{id}/{relation}','BusesController');


//Verb	URI	Action	Route Name
//GET	/photos	index	photos.index
//GET	/photos/create	create	photos.create
//POST	/photos	store	photos.store
//GET	/photos/{photo}	show	photos.show
//GET	/photos/{photo}/edit	edit	photos.edit
//PUT/PATCH	/photos/{photo}	update	photos.update
//DELETE	/photos/{photo}	destroy	photos.destroy