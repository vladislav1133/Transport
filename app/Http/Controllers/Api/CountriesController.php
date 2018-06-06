<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Country;
use App\Repositories\CountriesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @resource Countries
 */
class CountriesController extends Controller
{
    private $countriesRepository;

    public function __construct(CountriesRepository $countriesRepository)
    {

        $this->countriesRepository = $countriesRepository;
    }

    /**
     * Display all available countries
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        $response['status'] = true;

        $countries = Country::where('available', 1)->get();

        $response['data']['countries'] = $countries;

        return response()->json($response);
    }

    /**
     * Display all available cities for specified country
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCitiesByCode($code)
    {
        $response['status'] = true;

        $cities = $this->countriesRepository->getCitiesByCode($code);

        $response['data']['cities'] = $cities;

        return response()->json($response);
    }
}
