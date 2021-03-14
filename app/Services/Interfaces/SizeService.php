<?php

namespace App\Services\Interfaces;

interface SizeService
{
    public function list();
    public function findByCategory($category_id);
    public function store($data);
    public function detail($id);
    public function save($data, $id);
    public function delete($id);
}
