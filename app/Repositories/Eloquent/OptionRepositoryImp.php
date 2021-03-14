<?php


namespace App\Repositories\Eloquent;


use App\Enums\CommonStatus;
use App\Models\Option;
use App\Repositories\AbstractBaseRepository;
use App\Repositories\Interfaces\OptionRepository;

class OptionRepositoryImp extends AbstractBaseRepository implements OptionRepository
{
    protected $modelClass = Option::class;

    public function find($product_id, $color_id, $size_id)
    {
        $queryBuilder = $this->model->query()->where('status', CommonStatus::ACTIVE);
        if ($product_id) {
            $queryBuilder = $queryBuilder->where('product_id', $product_id);
        }
        if ($color_id) {
            $queryBuilder = $queryBuilder->where('color_id', $color_id);
        }
        if ($size_id) {
            $queryBuilder = $queryBuilder->where('size_id', $size_id);
        }
        return $queryBuilder->get();
    }
}
