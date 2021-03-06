<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\City;

class RegionController extends Controller
{
    public function getCities()
    {
        return City::all();
    }

    public function getDistricts(City $city) {
        return $city->districts()->get();
    }
}
