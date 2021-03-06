<?php


namespace App\Repositories\Eloquent;


use App\Models\City;
use App\Repositories\Interfaces\RegionRepository;

class RegionRepositoryImp implements RegionRepository
{
    public function getCities()
    {
        return City::all();
    }

    public function getDistricts($city_id)
    {
        return City::find($city_id)->districts()->get();
    }
}
