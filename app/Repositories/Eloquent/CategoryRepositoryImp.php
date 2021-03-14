<?php


namespace App\Repositories\Eloquent;


use App\Enums\CommonStatus;
use App\Models\Category;
use App\Repositories\AbstractBaseRepository;
use App\Repositories\Interfaces\CategoryRepository;

class CategoryRepositoryImp extends AbstractBaseRepository implements CategoryRepository
{
    protected $modelClass = Category::class;

    public function findParents()
    {
        return $this->model->query()
            ->where('status', CommonStatus::ACTIVE)
            ->where('parent_id', 0)
            ->with(['children' => function($q) {
                $q->where('status', CommonStatus::ACTIVE);
            }, 'size'])->get();
    }

    public function findAll()
    {
        return $this->model->query()
            ->where('status', CommonStatus::ACTIVE)
            ->with(['children' => function($q) {
                $q->where('status', CommonStatus::ACTIVE);
            }, 'size'])->get();
    }

    public function findBySlug($slug)
    {
        return $this->model->query()
            ->where('slug', $slug)
            ->where('status', CommonStatus::ACTIVE)
            ->with(['children' => function($q) {
                $q->where('status', CommonStatus::ACTIVE);
            }, 'size'])->first();
    }
}
