<?php

namespace Tests\Unit\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Stop;
use App\Route;

class TransportsControllerTest extends TestCase
{
    public function testGetAll() {

        $response = json_decode($this->json('GET', '/api/v1/transports')->getContent());

        try {
            $this->assertEquals(200, $response->code);
            $this->assertEquals(true, $response->status);
            $this->assertEquals(1, count($response->data->transports));

        } catch (\Exception $exception) {

            echo $exception->getMessage();

            $this->assertTrue(false);
        }
    }

    public function testGetById() {

        $response = json_decode($this->json('GET', '/api/v1/transports/1')->getContent());

        try {
            $this->assertEquals(200, $response->code);
            $this->assertEquals(true, $response->status);
            $this->assertEquals(1, $response->data->transport->id);

        } catch (\Exception $exception) {

            echo $exception->getMessage();

            $this->assertTrue(false);
        }
    }
}
