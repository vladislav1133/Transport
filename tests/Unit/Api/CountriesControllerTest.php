<?php

namespace Tests\Unit\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Stop;
use App\Route;

class CountriesControllerTest extends TestCase
{
    public function testGetAllCountries() {

        $response = json_decode($this->json('GET', '/api/v1/countries')->getContent());

        try {
            $this->assertEquals(200, $response->code);
            $this->assertEquals(true, $response->status);
            $this->assertEquals(1, count($response->data->countries));
            $this->assertEquals('UA', $response->data->countries[0]->code);

        } catch (\Exception $exception) {

            echo $exception->getMessage();

            $this->assertTrue(false);
        }
    }

    public function testGetAllCities() {

        $response = json_decode($this->json('GET', '/api/v1/countries/UA/cities')->getContent());

        try {

            $this->assertEquals(200, $response->code);
            $this->assertEquals(true, $response->status);
            $this->assertEquals('Kharkiv', $response->data->cities[0]->name);

        } catch (\Exception $exception) {

            echo $exception->getMessage();

            $this->assertTrue(false);
        }
    }
}
