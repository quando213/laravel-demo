<?php

namespace App\Services\Interfaces;

interface ColorService
{
    public function list();
    public function store($data);
    public function detail($id);
    public function save($data, $id);
    public function delete($id);
}
