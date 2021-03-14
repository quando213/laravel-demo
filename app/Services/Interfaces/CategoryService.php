<?php

namespace App\Services\Interfaces;

interface CategoryService
{
    public function list();
    public function findBySlug($slug);
    public function store($data);
    public function detail($id);
    public function save($data, $id);
    public function delete($id);
}
