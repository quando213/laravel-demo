<?php


namespace App\Repositories\Eloquent;


use App\Models\Category;
use App\Repositories\AbstractBaseRepository;
use App\Repositories\Interfaces\CategoryRepository;

class CategoryRepositoryImp extends AbstractBaseRepository implements CategoryRepository
{
    protected $modelClass = Category::class;

}
