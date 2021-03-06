<?php

namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepository;

interface CategoryRepository extends BaseRepository
{
    public function findParents();
    public function findBySlug($slug);
}
