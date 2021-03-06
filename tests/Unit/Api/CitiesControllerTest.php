<?php

namespace Tests\Unit\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Stop;
use App\Route;

class CitiesControllerTest extends TestCase
{
    public function testGetAllTransports()
    {

        $response = json_decode($this->json('GET', '/api/v1/cities/1/transports')->getContent());

        try {

            $this->assertEquals(200, $response->code);
            $this->assertEquals(true, $response->status);
            $this->assertEquals(1, count($response->data->transports));

        } catch (\Exception $exception) {

            echo $exception->getMessage();

            $this->assertTrue(false);

        }
    }

    public function testGetAllRoutes()
    {

        $response = json_decode($this->json('GET', '/api/v1/cities/1/routes')->getContent());

        try {

            $this->assertEquals(200, $response->code);
            $this->assertEquals(true, $response->status);
            $this->assertEquals(1, count($response->data->routes));

        } catch (\Exception $exception) {

            echo $exception->getMessage();

            $this->assertTrue(false);
        }


    }
}
