<?php

namespace Tests\Unit\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Stop;
use App\Route;

class StopsControllerTest extends TestCase
{
    public function testGetAllTransports()
    {
        $response = json_decode($this->json('GET', '/api/v1/stops')->getContent());

        try {

            $this->assertEquals(200, $response->code);
            $this->assertEquals(true, $response->status);
            $this->assertEquals(7, count($response->data->stops));

        } catch (\Exception $exception) {

            echo $exception->getMessage();

            $this->assertTrue(false);
        }
    }

    public function testGetById()
    {
        $response = json_decode($this->json('GET', '/api/v1/stops/1')->getContent());

        try {

            $this->assertEquals(200, $response->code);
            $this->assertEquals(true, $response->status);
            $this->assertEquals(1, count($response->data->stop->id));

        } catch (\Exception $exception) {

            echo $exception->getMessage();

            $this->assertTrue(false);
        }
    }
}
