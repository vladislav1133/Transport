<?php

namespace App\Services\Contracts;


class DistanceServiceInterface
{


    public static function getRouteDistance($points, $slice = false, $precision = 3){

        $distance = 0;

        if ($slice) {

            $points = array_slice($points, $slice);
        }


        for ($i = 0; $i < count($points) - 1; $i++) {

            $chunkDistance = Stop::getDistance($points[$i]["lat"], $points[$i]["lon"], $points[$i + 1]["lat"], $points[$i + 1]["lon"], $precision);

            $distance += $chunkDistance;

        }

        return $distance;
    }

}