<?php

namespace App\Services\Interfaces;

interface ProductService
{
    public function list($search, $status, $category_id);
    public function store($data);
    public function detail($id);
    public function save($data, $id);
    public function delete($id);
}
