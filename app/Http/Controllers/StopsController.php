<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stop;

class StopsController extends Controller
{
    public function __construct(){

        $this->middleware('auth:api')
            ->except('index','show');
    }

    public function index(){

        $stops = Stop::get();

        $stops = json_encode($stops,JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE);

        return response($stops);
    }

    public function show($id){

        $stops = Stop::find($id);

        $stops = json_encode($stops,JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE);

        return response($stops);
    }
}
