<?php


namespace App\Repositories\Eloquent;


use App\Models\Color;
use App\Repositories\AbstractBaseRepository;
use App\Repositories\Interfaces\ColorRepository;

class ColorRepositoryImp extends AbstractBaseRepository implements ColorRepository
{
    protected $modelClass = Color::class;
}
