<?php

namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepository;

interface OptionRepository extends BaseRepository
{
    public function find($product_id, $color_id, $size_id);
}
