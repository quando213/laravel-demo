<?php

namespace App\Services\Interfaces;

use App\Models\User;

interface DtoService
{
    public function userDto(User $user);
}
