<?php


namespace App\Services\Eloquent;

use App\Repositories\Interfaces\CategoryRepository;
use App\Repositories\Interfaces\SizeRepository;
use App\Services\Interfaces\CategoryService;

class CategoryServiceImp implements CategoryService
{
    private $categoryRepository;
    private $sizeRepository;

    public function __construct(CategoryRepository $categoryRepository, SizeRepository $sizeRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->sizeRepository = $sizeRepository;
    }

    public function list()
    {
        return $this->categoryRepository->findParents();
    }

    public function findBySlug($slug)
    {
        return $this->categoryRepository->findBySlug($slug);
    }

    public function store($data)
    {
        $this->checkSizeExist($data);
        $data['slug'] = $this->categoryRepository->toSlug($data['name']);
        return $this->categoryRepository->create($data);
    }

    public function detail($id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function save($data, $id)
    {
        $this->checkSizeExist($data);
        $oldName = $this->categoryRepository->findById($id)->name;
        if ($oldName != $data['name']) {
            $data['slug'] = $this->categoryRepository->toSlug($data['name']);
        }
        return $this->categoryRepository->findByIdAndUpdate($data, $id);
    }

    public function delete($id)
    {
        return $this->categoryRepository->findByIdAndDelete($id);
    }

    public function checkSizeExist($data)
    {
        if (array_key_exists('size_id', $data)) {
            $size = $data['size_id'];
            if (!$this->sizeRepository->exists($size, 'id')) {
                throw new \Error('Invalid size');
            }
        }
    }
}
