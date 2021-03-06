<?php


namespace App\Services\Eloquent;

use App\Repositories\Interfaces\RegionRepository;
use App\Services\Interfaces\RegionService;

class RegionServiceImp implements RegionService
{
    private $regionRepository;

    public function __construct(RegionRepository $regionRepository)
    {
        $this->regionRepository = $regionRepository;
    }

    public function getCities()
    {
        return $this->regionRepository->getCities();
    }

    public function getDistricts($city_id)
    {
        return $this->regionRepository->getDistricts($city_id);
    }
}
