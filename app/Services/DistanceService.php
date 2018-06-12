<?php

namespace App\Services;


class DistanceService
{


    public static function getRouteDistance($points, $slice = false, $precision = 3)
    {
        $distance = 0;

        if ($slice) {

            $points = array_slice($points, $slice);
        }


        for ($i = 0; $i < count($points) - 1; $i++) {

            $point1 = ["lon" => $points[$i]["lon"], "lat" => $points[$i]["lat"]];
            $point2 = ["lon" => $points[$i + 1]["lon"], "lat" => $points[$i + 1]["lat"]];

            $chunkDistance = self::getDistance($point1, $point2, $precision);

            $distance += $chunkDistance;
        }

        return $distance;
    }

    public static function getDistance($point1, $point2, $precision = false)
    {

        $theta = $point1["lon"] - $point2["lon"];
        $dist = sin(deg2rad($point1["lat"])) * sin(deg2rad($point2["lat"])) + cos(deg2rad($point1["lat"])) * cos(deg2rad($point2["lat"])) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        $km = $miles * 1.609344;

        if ($precision) {

            return round($km, $precision);
        }

        return $km;
    }

    public static function getNearestPoint($point, $points)
    {
        $nearestPoint = $points[0];

        $nearestDistance = self::getDistance($point, $points[0]);

        for ($i = 1; $i < count($points); $i++) {

            $distance = self::getDistance($point, $points[$i]);

            if ($distance < $nearestDistance) {

                $nearestDistance = $distance;

                $nearestPoint = $points[$i];
            }
        }

        return $nearestPoint;
    }
}