<?php

namespace App\Services\Interfaces;

interface OptionService
{
    public function list($product_id, $color_id, $size_id);
    public function store($data);
    public function detail($id);
    public function save($data, $id);
    public function delete($id);
}
