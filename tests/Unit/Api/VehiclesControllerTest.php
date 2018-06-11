<?php

namespace Tests\Unit\Api;

use App\Vehicle;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Stop;
use App\Route;

class VehiclesControllerTest extends TestCase
{
    public function testGetAll() {

        $response = json_decode($this->json("GET", "/api/v1/vehicles")->getContent());

        try {
            $this->assertEquals(200, $response->code);
            $this->assertEquals(true, $response->status);
            $this->assertEquals(3, count($response->data->vehicles));

        } catch (\Exception $exception) {

            echo $exception->getMessage();

            $this->assertTrue(false);
        }
    }

    public function testGetById() {

        $response = json_decode($this->json("GET", "/api/v1/vehicles/1")->getContent());

        try {
            $this->assertEquals(200, $response->code);
            $this->assertEquals(true, $response->status);
            $this->assertEquals(1, $response->data->vehicle->id);

        } catch (\Exception $exception) {

            echo $exception->getMessage();

            $this->assertTrue(false);
        }
    }

    public function testUpdateById() {

        $stops = Stop::get();

        $lons = $stops->pluck("lon");
        $lats = $stops->pluck("lat");

        $pointLength = count($lons);
        $random = rand(0, $pointLength-1);

        $vehicle = Vehicle::first();
        $token = $vehicle->token;

        $point["lon"] = $lons[$random];
        $point["lat"] = $lats[$random];

        $response = json_decode($this->json("PUT", "/api/v1/vehicles/1", [
            "token" => $token,
            "direction" => 1,
            "available" => 1,
            "lon" => $point["lon"],
            "lat" => $point["lat"]
        ])->getContent());

        try {
            $this->assertEquals(200, $response->code);
            $this->assertEquals(true, $response->status);

            $vehicle = Vehicle::first();

            $this->assertEquals($point["lat"], $vehicle->lat);
            $this->assertEquals($point["lon"], $vehicle->lon);

        } catch (\Exception $exception) {

            echo $exception->getMessage();

            $this->assertTrue(false);
        }
    }
}
