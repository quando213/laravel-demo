<?php

namespace App\Services\Interfaces;

interface UserService
{
    public function list($search, $status, $limit);
    public function store($data);
    public function detail($id);
    public function save($data, $id);
    public function delete($id);
}
