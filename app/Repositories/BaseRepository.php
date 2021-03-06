<?php


namespace App\Repositories;


interface BaseRepository
{
    public function findAll();
    public function create($data);
    public function findById($id);
    public function findByIdAndUpdate($data, $id);
    public function findByIdAndDelete($id);
    public function exists($val, $column);
    public function toSlug($name);
}
