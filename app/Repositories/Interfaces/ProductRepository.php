<?php

namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepository;

interface ProductRepository extends BaseRepository
{
    public function find($search, $status, $limit, $category_id, $size, $color, $price_min, $price_max, $sort, $order);
    public function findBySlug($slug);
}
