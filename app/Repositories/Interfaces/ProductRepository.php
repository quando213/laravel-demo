<?php

namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepository;

interface ProductRepository extends BaseRepository
{
    public function find($search, $status, $category_id);
}
