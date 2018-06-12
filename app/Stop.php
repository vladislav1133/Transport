<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Bus;

class Stop extends Model {


    public function routes() {

        return $this->belongsToMany("App\Route");
    }


    //D
    public static function getDistance($lat1, $lon1, $lat2, $lon2, $precision = false) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        $km = $miles * 1.609344;
        if($precision) {

            return round($km, $precision);
        }

        return $km;
    }

    //



    //



    //D
    public static function getRouteDistance($stops, $slice = false, $precision = 3){

        $distance = 0;

        if($slice){

            $stops = array_slice($stops,$slice);
        }


        for($i=0; $i<count($stops)-1; $i++){

            $chunkDistance = Stop::getDistance($stops[$i]["lat"],$stops[$i]["lon"],$stops[$i+1]["lat"],$stops[$i+1]["lon"],$precision);

            $distance += $chunkDistance;

        }

        return $distance;
    }
}
