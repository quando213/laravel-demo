<?php

namespace App\Services\Interfaces;

interface RegionService
{
    public function getCities();
    public function getDistricts($city_id);
}
