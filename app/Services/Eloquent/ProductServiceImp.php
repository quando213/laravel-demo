<?php


namespace App\Services\Eloquent;

use App\Repositories\Interfaces\OptionRepository;
use App\Repositories\Interfaces\ProductRepository;
use App\Services\Interfaces\ProductService;

class ProductServiceImp implements ProductService
{
    private $productRepository;
    private $optionRepository;

    public function __construct(ProductRepository $productRepository, OptionRepository $optionRepository)
    {
        $this->productRepository = $productRepository;
        $this->optionRepository = $optionRepository;
    }

    public function list($search, $status, $limit, $category_id, $size = null, $color = null, $price_min = null, $price_max = null, $sort = null, $order = null)
    {
        return $this->productRepository->find($search, $status, $limit, $category_id, $size, $color, $price_min, $price_max, $sort, $order);
    }

    public function findBySlug($slug)
    {
        return $this->productRepository->findBySlug($slug);
    }

    public function store($data)
    {
        $data['slug'] = $this->productRepository->toSlug($data['name']);
        $product = $this->productRepository->create($data);
        foreach ($data['options'] as $option) {
            $option['product_id'] = $product->id;
            $this->optionRepository->create($option);
        }
        return $product;
    }

    public function detail($id)
    {
        return $this->productRepository->findById($id);
    }

    public function save($data, $id)
    {
        $oldName = $this->productRepository->findById($id)->name;
        if ($oldName != $data['name']) {
            $data['slug'] = $this->productRepository->toSlug($data['name']);
        }
        return $this->productRepository->findByIdAndUpdate($data, $id);
    }

    public function delete($id)
    {
        return $this->productRepository->findByIdAndDelete($id);
    }
}
