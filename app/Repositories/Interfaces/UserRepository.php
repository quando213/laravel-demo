<?php

namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepository;

interface UserRepository extends BaseRepository
{
    public function find($search, $status, $limit);
}
