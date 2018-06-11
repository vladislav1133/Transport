<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Bus;

class Stop extends Model {


    public function routes() {

        return $this->belongsToMany("App\Route");
    }


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

    public static function getNearestStop($lon, $lat) {

        $stops = Stop::get()->toArray();

       // dd($stops);

        $nearestStop = $stops[0];
        $nearestDistance = self::getDistance($lat,$lon,$stops[0]["lat"],$stops[0]["lon"]);

        for($i=1; $i<count($stops); $i++){

            $distance = self::getDistance($lat, $lon, $stops[$i]["lat"], $stops[$i]["lon"]);

            if($distance < $nearestDistance) {

                $nearestDistance =$distance;
                $nearestStop = $stops[$i];
            }
        }

        return $nearestStop;
    }


    public static function getBusesDistanceToUser($lon,$lat,$neededStopId) {

        $busesDistance = [];

        //1 Определяем ближайшую остановку

        $userStop = Stop::getNearestStop($lon, $lat);//
        $userStopId = $userStop["id"];
        //dd($userStop);

        // 2 Находим рут

        $routes = Route::with("stops","buses")->whereHas("stops", function ($query) use ($userStopId, $neededStopId) {
            $query->whereIn("stops.id", [$userStopId, $neededStopId]);
        })->get()->toArray();


        //dump("UserStopId ".$userStopId);
        //dump("NeedStop ".$neededStopId);



        //4 Получить дистанции автобусов

        foreach ($routes as $route) {

            $userDirection = true;
            //Установим флаг
            if($userStopId > $neededStopId) $userDirection = false;


            //dump("direction ".$userDirection);


            //dump("остановки");
            $stops = $routes[0]["stops"];
            //dump($stops);



            foreach ($route["buses"] as $bus) {

                $distance = 0;

                //dump("bus flag ".$bus["direction"]);
                //dump("ближайшая к басу");
                $stopNearestBus = Stop::getNearestStop($bus["lon"],$bus["lat"]);
                $stopNearestBusId = $stopNearestBus["id"];

                //dump("Ближайшая к басу ".$stopNearestBusId);



                //dump("В массиве");


                //получим ключ

                $key = Stop::getKeyArrayByIdStop($stops,$stopNearestBusId);
                $userKey = Stop::getKeyArrayByIdStop($stops,$userStopId);


                //dump($key);
                //dump($stops[$key]);

                $bus["direction"] = 0;

                //SCRIPTS WITH USER DIR ->

                //Script 1: U=3 N=4 B=6 FLAG = 1
                if($stopNearestBusId >= $userStopId && $userDirection == true && $bus["direction"] == true){

                    //6->7 to end
                    $distance1 = Stop::getRouteDistance($stops,$key);
                    //dump("distance_1");
                    //dump($distance1);

                    //7->1 end to start
                    $distance2 = Stop::getRouteDistance($stops);
                    //dump("distance_2");
                    //dump($distance2);

                    //1->3 start to user



                    $distance3 = Stop::getRouteDistance(array_slice($stops,0,$userKey+1));
                    //dump("distance_3");
                    //dump($distance3);

                    $distance = $distance1 + $distance2 + $distance3;
                }

                //Script 2: U=3 N=4 B=6 FLAG = 0
                if($stopNearestBusId >= $userStopId && $userDirection == true && $bus["direction"] == false){

                    //6->1 end to start
                    $distance1 = Stop::getRouteDistance(array_slice($stops,0,$key+1));
                    //dump("distance_1");
                    //dump($distance1);

                    //1->3 start to user

                    $userKey = Stop::getKeyArrayByIdStop($stops,$userStopId);

                    $distance2 = Stop::getRouteDistance(array_slice($stops,0,$userKey+1));
                    //dump("distance_2");
                    //dump($distance2);

                    $distance = $distance1 + $distance2;
                }

                //Script 3: U=3 N=4 B=2 FLAG = 1
                if($stopNearestBusId < $userStopId && $userDirection == true && $bus["direction"] == true){

                    //2->3
                    $distance1 = Stop::getRouteDistance(array_slice($stops,$key,$userKey));

                    //dump("distance_1");
                    //dump($distance1);
                    $distance = $distance1;

                }

                //Script 4: U=3 N=4 B=2 FLAG = 0
                if($stopNearestBusId < $userStopId && $userDirection == true && $bus["direction"] == false) {

                    //2->1
                    $distance1 = Stop::getRouteDistance(array_slice($stops,0,$key+1));
                    //dump("distance_1");
                    //dump($distance1);

                    //1->3
                    $distance2 = Stop::getRouteDistance(array_slice($stops,0,$userKey+1));
                    //dump("distance_2");
                    //dump($distance2);

                    $distance = $distance1 + $distance2;
                }


                //SCRIPTS WITH USER DIR <-

                //Script 5: U=4 N=3 B=2 FLAG = 1
                if($stopNearestBusId < $userStopId && $userDirection == false && $bus["direction"] == true){

                    //2->7
                    $distance1 = Stop::getRouteDistance(array_slice($stops,$key));
                    //dump("distance_1");
                    //dump($distance1);

                    //7->4
                    $distance2 = Stop::getRouteDistance(array_slice($stops,$userKey));
                    //dump("distance_2");
                    //dump($distance2);

                    $distance = $distance1 + $distance2;
                }

                //Script 6: U=4 N=3 B=2 FLAG = 0
                if($stopNearestBusId < $userStopId && $userDirection == false && $bus["direction"] == false) {

                    //6->7 to end
                    $distance1 = Stop::getRouteDistance(array_slice($stops,0, $key+1));
                    //dump("distance_1");
                    //dump($distance1);



                    //7->1 end to start
                    $distance2 = Stop::getRouteDistance($stops);
                    //dump("distance_2");
                    //dump($distance2);

                    //1->3 start to user



                    $distance3 = Stop::getRouteDistance(array_slice($stops,0,$userKey+1));
                    //dump("distance_3");
                    //dump($distance3);

                    $distance = $distance1 + $distance2 + $distance3;
                }

                //Script 7: U=4 N=3 B=6 FLAG = 1
                if($stopNearestBusId >= $userStopId && $userDirection == false && $bus["direction"] == true) {

                    //2->7
                    $distance1 = Stop::getRouteDistance(array_slice($stops,$key));
                    //dump("distance_1");
                    //dump($distance1);

                    //7->4
                    $distance2 = Stop::getRouteDistance(array_slice($stops,$userKey));
                    //dump("distance_2");
                    //dump($distance2);

                    $distance = $distance1 + $distance2;
                }


                //Script 8 U=4 N=3 B=6 FLAG = 0
                if($stopNearestBusId >= $userStopId && $userDirection == false && $bus["direction"] == false) {

                    //6->4
                    $distance1 = Stop::getRouteDistance(array_slice($stops,$userKey, ($key-$userKey)+1 ));
                    //dump("distance_1");
                    //dump($distance1);


                    $distance = $distance1;
                }

                //end
                //dump($distance);

                $busesDistance[] = [
                    "bus_id" => $bus["id"],
                    "distance" => $distance
                ];
            }
        }


        //get nearest bus

        $nearestDistance = 0;

        $nearestBus = null;
        foreach ($busesDistance as $busD){

            if($busD["distance"] > $nearestDistance) {
                $nearestDistance = $busD["distance"];
                $nearestBus = $busD;
            }
        }

        $response = [];

        $response["bus"] = Bus::find($nearestBus["bus_id"])->toArray();
        $response["time"] = intval(round($nearestBus["distance"]/45*3600));
        $response["stop"] = $userStop;
        return $response;
    }

    public static function getKeyArrayByIdStop($stops,$id) {

        $key = null;

        foreach ($stops as $k=>$stop) {
            if($stop["id"] === $id) $key = $k;
        }

        return $key;
    }

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
