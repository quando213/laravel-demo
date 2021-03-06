<?php


namespace App\Repositories\Eloquent;


use App\Models\Size;
use App\Repositories\AbstractBaseRepository;
use App\Repositories\Interfaces\SizeRepository;

class SizeRepositoryImp extends AbstractBaseRepository implements SizeRepository
{
    protected $modelClass = Size::class;
}
