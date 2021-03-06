<?php


namespace App\Services\Eloquent;

use App\Repositories\Interfaces\OptionRepository;
use App\Services\Interfaces\OptionService;

class OptionServiceImp implements OptionService
{
    private $optionRepository;

    public function __construct(OptionRepository $optionRepository)
    {
        $this->optionRepository = $optionRepository;
    }

    public function list($product_id, $color_id, $size_id)
    {
        return $this->optionRepository->find($product_id, $color_id, $size_id);
    }

    public function store($data)
    {
        return $this->optionRepository->create($data);
    }

    public function detail($id)
    {
        return $this->optionRepository->findById($id);
    }

    public function save($data, $id)
    {
        return $this->optionRepository->findByIdAndUpdate($data, $id);
    }

    public function delete($id)
    {
        return $this->optionRepository->findByIdAndDelete($id);
    }
}
