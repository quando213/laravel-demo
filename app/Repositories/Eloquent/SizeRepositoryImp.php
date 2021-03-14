<?php


namespace App\Repositories\Eloquent;


use App\Enums\CommonStatus;
use App\Models\Size;
use App\Repositories\AbstractBaseRepository;
use App\Repositories\Interfaces\SizeRepository;

class SizeRepositoryImp extends AbstractBaseRepository implements SizeRepository
{
    protected $modelClass = Size::class;

    public function findParents()
    {
        return $this->model->query()
            ->where('status', CommonStatus::ACTIVE)
            ->where('parent_id', 0)
            ->with(['children' => function($q) {
                $q->where('status', CommonStatus::ACTIVE);
            }])->get();
    }

    public function findAll()
    {
        return $this->model->query()
            ->where('status', CommonStatus::ACTIVE)
            ->get();
    }
}
