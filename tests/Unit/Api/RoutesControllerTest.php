<?php

namespace Tests\Unit\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Stop;
use App\Route;

class RoutesControllerTest extends TestCase
{
    public function testGetAll() {

        $response = json_decode($this->json('GET', '/api/v1/routes')->getContent());

        try {
            $this->assertEquals(200, $response->code);
            $this->assertEquals(true, $response->status);
            $this->assertEquals(1, count($response->data->routes));

        } catch (\Exception $exception) {

            echo $exception->getMessage();

            $this->assertTrue(false);
        }
    }

    public function testGetById() {

        $response = json_decode($this->json('GET', '/api/v1/routes/1')->getContent());

        try {
            $this->assertEquals(200, $response->code);
            $this->assertEquals(true, $response->status);
            $this->assertEquals(1, count($response->data->route));

        } catch (\Exception $exception) {

            echo $exception->getMessage();

            $this->assertTrue(false);
        }
    }
}
