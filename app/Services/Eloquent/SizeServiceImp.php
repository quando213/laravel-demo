<?php


namespace App\Services\Eloquent;

use App\Repositories\Interfaces\SizeRepository;
use App\Services\Interfaces\SizeService;

class SizeServiceImp implements SizeService
{
    private $sizeRepository;

    public function __construct(SizeRepository $sizeRepository)
    {
        $this->sizeRepository = $sizeRepository;
    }

    public function list()
    {
        return $this->sizeRepository->findAll();
    }

    public function store($data)
    {
        return $this->sizeRepository->create($data);
    }

    public function detail($id)
    {
        return $this->sizeRepository->findById($id);
    }

    public function save($data, $id)
    {
        return $this->sizeRepository->findByIdAndUpdate($data, $id);
    }

    public function delete($id)
    {
        return $this->sizeRepository->findByIdAndDelete($id);
    }
}
