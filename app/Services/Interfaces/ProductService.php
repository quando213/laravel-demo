<?php

namespace App\Services\Interfaces;

interface ProductService
{
    public function list($search, $status, $limit, $category_id, $size = null, $color = null, $price_min = null, $price_max = null, $sort = null, $order = null);
    public function findBySlug($slug);
    public function store($data);
    public function detail($id);
    public function save($data, $id);
    public function delete($id);
}
