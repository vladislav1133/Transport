<?php

namespace App\Repositories;

use App\City;
use App\Route;
use App\Services\DistanceService;
use App\Stop;

class StopsRepository
{
    public function getAll()
    {

        $stops = Stop::get();

        return $stops;
    }

    public function getById($id)
    {

        $stop = Stop::where("id", $id)->first();

        return $stop;
    }

    public static function getNearestVehicleToUser($point, $neededStopId)
    {

        $busesDistance = [];

        //1 Get nearest routes

        $userStop = self::getNearestStop($point);

        $routes = Route::with("stops", "transports.vehicles")->whereHas("stops", function ($query) use ($userStop, $neededStopId) {
            $query->whereIn("stops.id", [$userStop->id, $neededStopId]);
        })->get();


        //4 Получить дистанции автобусов

        foreach ($routes as $route) {


            $userDirection = true;
            //Установим флаг

            $stops = $route->stops->toArray();

            $userStopIdIndex = self::getKeyArrayByIdStop($stops, $userStop->id);

            $neededStopIdIndex = self::getKeyArrayByIdStop($stops, $neededStopId);

            if ($userStopIdIndex > $neededStopIdIndex) $userDirection = false;


            $vehiclesWithDistance = [];

            foreach ($route->transports as $transport) {

                foreach ($transport->vehicles as $vehicle) {

                    $distance = 0;


                    $stopNearestBus = self::getNearestStop($vehicle);

                    $stopNearestBusId = $stopNearestBus["id"];

                    //получим ключ

                     $key = self::getKeyArrayByIdStop($stops, $stopNearestBusId);
                     $userKey = self::getKeyArrayByIdStop($stops, $userStop->id);


                    //SCRIPTS WITH USER DIR ->

                    //Script 1: U=3 N=4 B=6 FLAG = 1
                    if ($stopNearestBusId >= $userStop->id && $userDirection == true && $vehicle->direction == true) {



                        //6->7 to end
                        $distance1 = Stop::getRouteDistance($stops, $key);
                        //dump("distance_1");
                        //dump($distance1);

                        //7->1 end to start
                        $distance2 = Stop::getRouteDistance($stops);
                        //dump("distance_2");
                        //dump($distance2);

                        //1->3 start to user


                        $distance3 = Stop::getRouteDistance(array_slice($stops, 0, $userKey + 1));
                        //dump("distance_3");
                        //dump($distance3);

                        $distance = $distance1 + $distance2 + $distance3;
                    }

                    //Script 2: U=3 N=4 B=6 FLAG = 0
                    if ($stopNearestBusId >= $userStop->id && $userDirection == true && $vehicle->direction == false) {


                        //6->1 end to start


                        $distance1 = DistanceService::getRouteDistance(array_slice($stops, 0, $key + 1));


                        //1->3 start to user

                        $userKey = self::getKeyArrayByIdStop($stops, $userStop->id);


                        $distance2 = DistanceService::getRouteDistance(array_slice($stops, 0, $userKey + 1));




                        $distance = $distance1 + $distance2;
                    }

                    //Script 3: U=3 N=4 B=2 FLAG = 1
                    if ($stopNearestBusId < $userStop->id && $userDirection == true && $vehicle->direction == true) {


                        //2->3
                        $distance1 = Stop::getRouteDistance(array_slice($stops, $key, $userKey));

                        //dump("distance_1");
                        //dump($distance1);
                        $distance = $distance1;

                    }

                    //Script 4: U=3 N=4 B=2 FLAG = 0
                    if ($stopNearestBusId < $userStop->id && $userDirection == true && $vehicle->direction == false) {


                        //2->1
                        $distance1 = Stop::getRouteDistance(array_slice($stops, 0, $key + 1));
                        //dump("distance_1");
                        //dump($distance1);

                        //1->3
                        $distance2 = Stop::getRouteDistance(array_slice($stops, 0, $userKey + 1));
                        //dump("distance_2");
                        //dump($distance2);

                        $distance = $distance1 + $distance2;
                    }


                    //SCRIPTS WITH USER DIR <-

                    //Script 5: U=4 N=3 B=2 FLAG = 1
                    if ($stopNearestBusId < $userStop->id && $userDirection == false && $vehicle->direction == true) {


                        //2->7
                        $distance1 = Stop::getRouteDistance(array_slice($stops, $key));
                        //dump("distance_1");
                        //dump($distance1);

                        //7->4
                        $distance2 = Stop::getRouteDistance(array_slice($stops, $userKey));
                        //dump("distance_2");
                        //dump($distance2);

                        $distance = $distance1 + $distance2;
                    }

                    //Script 6: U=4 N=3 B=2 FLAG = 0
                    if ($stopNearestBusId < $userStop->id && $userDirection == false && $vehicle->direction == false) {


                        //6->7 to end
                        $distance1 = Stop::getRouteDistance(array_slice($stops, 0, $key + 1));
                        //dump("distance_1");
                        //dump($distance1);


                        //7->1 end to start
                        $distance2 = Stop::getRouteDistance($stops);
                        //dump("distance_2");
                        //dump($distance2);

                        //1->3 start to user


                        $distance3 = Stop::getRouteDistance(array_slice($stops, 0, $userKey + 1));
                        //dump("distance_3");
                        //dump($distance3);

                        $distance = $distance1 + $distance2 + $distance3;
                    }

                    //Script 7: U=4 N=3 B=6 FLAG = 1
                    if ($stopNearestBusId >= $userStop->id && $userDirection == false && $vehicle->direction == true) {

                        //2->7
                        $distance1 = Stop::getRouteDistance(array_slice($stops, $key));
                        //dump("distance_1");
                        //dump($distance1);

                        //7->4
                        $distance2 = Stop::getRouteDistance(array_slice($stops, $userKey));
                        //dump("distance_2");
                        //dump($distance2);

                        $distance = $distance1 + $distance2;
                    }


                    //Script 8 U=4 N=3 B=6 FLAG = 0
                    if ($stopNearestBusId >= $userStop->id && $userDirection == false && $vehicle->direction == false) {

                        //6->4
                        $distance1 = Stop::getRouteDistance(array_slice($stops, $userKey, ($key - $userKey) + 1));
                        //dump("distance_1");
                        //dump($distance1);


                        $distance = $distance1;
                    }

                    //end
                    //dump($distance);

                    $busesDistance = [
                        "distance" => $distance,
                       // "vehicle" => $vehicle

                    ];

                    array_push($vehiclesWithDistance, $busesDistance);

                }

            }

            dd($vehiclesWithDistance);

//            foreach ($route["buses"] as $bus) {
//
//                $distance = 0;
//
//                //dump("bus flag ".$bus["direction"]);
//                //dump("ближайшая к басу");
//                $stopNearestBus = self::getNearestStop($bus);
//                $stopNearestBusId = $stopNearestBus["id"];
//
//                //dump("Ближайшая к басу ".$stopNearestBusId);
//
//
//                //dump("В массиве");
//
//
//                //получим ключ
//
//               // $key = Stop::getKeyArrayByIdStop($stops, $stopNearestBusId);
//               // $userKey = Stop::getKeyArrayByIdStop($stops, $userStopId);
//
//
//                //dump($key);
//                //dump($stops[$key]);
//
//                $bus["direction"] = 0;
//
//                //SCRIPTS WITH USER DIR ->
//
//                //Script 1: U=3 N=4 B=6 FLAG = 1
//                if ($stopNearestBusId >= $userStop->id && $userDirection == true && $bus["direction"] == true) {
//
//                    //6->7 to end
//                    $distance1 = Stop::getRouteDistance($stops, $key);
//                    //dump("distance_1");
//                    //dump($distance1);
//
//                    //7->1 end to start
//                    $distance2 = Stop::getRouteDistance($stops);
//                    //dump("distance_2");
//                    //dump($distance2);
//
//                    //1->3 start to user
//
//
//                    $distance3 = Stop::getRouteDistance(array_slice($stops, 0, $userKey + 1));
//                    //dump("distance_3");
//                    //dump($distance3);
//
//                    $distance = $distance1 + $distance2 + $distance3;
//                }
//
//                //Script 2: U=3 N=4 B=6 FLAG = 0
//                if ($stopNearestBusId >= $userStopId && $userDirection == true && $bus["direction"] == false) {
//
//                    //6->1 end to start
//                    $distance1 = Stop::getRouteDistance(array_slice($stops, 0, $key + 1));
//                    //dump("distance_1");
//                    //dump($distance1);
//
//                    //1->3 start to user
//
//                    $userKey = self::getKeyArrayByIdStop($stops, $userStopId);
//
//                    $distance2 = Stop::getRouteDistance(array_slice($stops, 0, $userKey + 1));
//                    //dump("distance_2");
//                    //dump($distance2);
//
//                    $distance = $distance1 + $distance2;
//                }
//
//                //Script 3: U=3 N=4 B=2 FLAG = 1
//                if ($stopNearestBusId < $userStopId && $userDirection == true && $bus["direction"] == true) {
//
//                    //2->3
//                    $distance1 = Stop::getRouteDistance(array_slice($stops, $key, $userKey));
//
//                    //dump("distance_1");
//                    //dump($distance1);
//                    $distance = $distance1;
//
//                }
//
//                //Script 4: U=3 N=4 B=2 FLAG = 0
//                if ($stopNearestBusId < $userStopId && $userDirection == true && $bus["direction"] == false) {
//
//                    //2->1
//                    $distance1 = Stop::getRouteDistance(array_slice($stops, 0, $key + 1));
//                    //dump("distance_1");
//                    //dump($distance1);
//
//                    //1->3
//                    $distance2 = Stop::getRouteDistance(array_slice($stops, 0, $userKey + 1));
//                    //dump("distance_2");
//                    //dump($distance2);
//
//                    $distance = $distance1 + $distance2;
//                }
//
//
//                //SCRIPTS WITH USER DIR <-
//
//                //Script 5: U=4 N=3 B=2 FLAG = 1
//                if ($stopNearestBusId < $userStopId && $userDirection == false && $bus["direction"] == true) {
//
//                    //2->7
//                    $distance1 = Stop::getRouteDistance(array_slice($stops, $key));
//                    //dump("distance_1");
//                    //dump($distance1);
//
//                    //7->4
//                    $distance2 = Stop::getRouteDistance(array_slice($stops, $userKey));
//                    //dump("distance_2");
//                    //dump($distance2);
//
//                    $distance = $distance1 + $distance2;
//                }
//
//                //Script 6: U=4 N=3 B=2 FLAG = 0
//                if ($stopNearestBusId < $userStopId && $userDirection == false && $bus["direction"] == false) {
//
//                    //6->7 to end
//                    $distance1 = Stop::getRouteDistance(array_slice($stops, 0, $key + 1));
//                    //dump("distance_1");
//                    //dump($distance1);
//
//
//                    //7->1 end to start
//                    $distance2 = Stop::getRouteDistance($stops);
//                    //dump("distance_2");
//                    //dump($distance2);
//
//                    //1->3 start to user
//
//
//                    $distance3 = Stop::getRouteDistance(array_slice($stops, 0, $userKey + 1));
//                    //dump("distance_3");
//                    //dump($distance3);
//
//                    $distance = $distance1 + $distance2 + $distance3;
//                }
//
//                //Script 7: U=4 N=3 B=6 FLAG = 1
//                if ($stopNearestBusId >= $userStopId && $userDirection == false && $bus["direction"] == true) {
//
//                    //2->7
//                    $distance1 = Stop::getRouteDistance(array_slice($stops, $key));
//                    //dump("distance_1");
//                    //dump($distance1);
//
//                    //7->4
//                    $distance2 = Stop::getRouteDistance(array_slice($stops, $userKey));
//                    //dump("distance_2");
//                    //dump($distance2);
//
//                    $distance = $distance1 + $distance2;
//                }
//
//
//                //Script 8 U=4 N=3 B=6 FLAG = 0
//                if ($stopNearestBusId >= $userStopId && $userDirection == false && $bus["direction"] == false) {
//
//                    //6->4
//                    $distance1 = Stop::getRouteDistance(array_slice($stops, $userKey, ($key - $userKey) + 1));
//                    //dump("distance_1");
//                    //dump($distance1);
//
//
//                    $distance = $distance1;
//                }
//
//                //end
//                //dump($distance);
//
//                $busesDistance[] = [
//                    "bus_id" => $bus["id"],
//                    "distance" => $distance
//                ];
//            }
        }


        //get nearest bus

        $nearestDistance = 0;

        $nearestBus = null;
        foreach ($busesDistance as $busD) {

            if ($busD["distance"] > $nearestDistance) {
                $nearestDistance = $busD["distance"];
                $nearestBus = $busD;
            }
        }

        $response = [];

        $response["bus"] = Bus::find($nearestBus["bus_id"])->toArray();
        $response["time"] = intval(round($nearestBus["distance"] / 45 * 3600));
        $response["stop"] = $userStop;
        return $response;
    }

    public static function getNearestStop($point)
    {

        $stops = Stop::get();

        $nearestStop = DistanceService::getNearestPoint($point, $stops);

        return $nearestStop;
    }

    public static function getKeyArrayByIdStop($stops, $id)
    {

        $key = null;

        foreach ($stops as $k => $stop) {
            if ($stop["id"] === $id) $key = $k;
        }

        return $key;
    }

}