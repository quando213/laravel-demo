<?php


namespace App\Services\Eloquent;

use App\Repositories\Interfaces\CategoryRepository;
use App\Repositories\Interfaces\SizeRepository;
use App\Services\Interfaces\SizeService;

class SizeServiceImp implements SizeService
{
    private $sizeRepository;
    private $categoryRepository;

    public function __construct(SizeRepository $sizeRepository, CategoryRepository $categoryRepository)
    {
        $this->sizeRepository = $sizeRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function list()
    {
        return $this->sizeRepository->findParents();
    }

    public function findByCategory($category_id)
    {
        $result = $this->categoryRepository->findById($category_id)->size;
        if ($result) {
            return $result->children;
        } else {
            $result = $this->sizeRepository->findAll();
        }
        return $result;
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
