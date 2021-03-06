<?php


namespace App\Services\Eloquent;

use App\Repositories\Interfaces\ColorRepository;
use App\Services\Interfaces\ColorService;

class ColorServiceImp implements ColorService
{
    private $colorRepository;

    public function __construct(ColorRepository $colorRepository)
    {
        $this->colorRepository = $colorRepository;
    }

    public function list()
    {
        return $this->colorRepository->findAll();
    }

    public function store($data)
    {
        return $this->colorRepository->create($data);
    }

    public function detail($id)
    {
        return $this->colorRepository->findById($id);
    }

    public function save($data, $id)
    {
        return $this->colorRepository->findByIdAndUpdate($data, $id);
    }

    public function delete($id)
    {
        return $this->colorRepository->findByIdAndDelete($id);
    }
}
