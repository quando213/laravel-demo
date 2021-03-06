<?php

namespace App\Repositories\Interfaces;


interface RegionRepository
{
    public function getCities();
    public function getDistricts($city_id);
}
