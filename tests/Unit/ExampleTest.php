<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Stop;
use App\Route;

class ExampleTest extends TestCase
{
    /* Calculate distance between two points */

    public function testGetDistance()
    {


        $user['lon'] = 36.26390000;//5
        $user['lat'] = 50.01840300;
        $stop['lon'] = 36.27059700;//7
        $stop['lat'] = 50.02089200;

        $this->assertEquals(0.55,Stop::getDistance($user['lat'], $user['lon'], $stop['lat'], $stop['lon'],2));
    }


    public function testGetNearestStop(){

        //find 5
        $user['lon'] = 36.26390000;//5
        $user['lat'] = 50.01840300;

        $stops = Route::find(1)->stops->toArray();


        $this->assertEquals(5,Stop::getNearestStop($user, $stops)['id']);

        //find 2

        $stop2 = Stop::find(2);



        $userStop['lon'] = $stop2->lon;
        $userStop['lat'] = $stop2->lat;

        $this->assertEquals(2,Stop::getNearestStop($userStop, $stops)['id']);
    }
}
