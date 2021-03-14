<?php


namespace App\Repositories\Eloquent;


use App\Enums\CommonStatus;
use App\Models\Product;
use App\Repositories\AbstractBaseRepository;
use App\Repositories\Interfaces\ProductRepository;
use Illuminate\Database\Eloquent\Builder;

class ProductRepositoryImp extends AbstractBaseRepository implements ProductRepository
{
    protected $modelClass = Product::class;

    public function find($search, $status, $limit, $category_id, $size, $color, $price_min, $price_max, $sort, $order)
    {
        $queryBuilder = $this->model->query()->with(['category', 'options']);
        if ($search) {
            $queryBuilder = $queryBuilder->where(function (Builder $q) use ($search) {
                return $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%');
            });
        }
        if ($status) {
            $queryBuilder = $queryBuilder->where('status', $status);
        }
        if ($category_id) {
            $queryBuilder = $queryBuilder->where('category_id', $category_id);
        }
        if ($size) {
            $queryBuilder = $queryBuilder->whereHas('options', function ($query) use ($size) {
                $query->whereIn('size_id', $size);
            });
        }
        if ($color) {
            $queryBuilder = $queryBuilder->whereHas('options', function ($query) use ($color) {
                $query->whereIn('color_id', $color);
            });
        }
        if ($price_min) {
            $queryBuilder = $queryBuilder->where('price', '>', $price_min);
        }
        if ($price_max) {
            $queryBuilder = $queryBuilder->where('price', '<', $price_max);
        }
        if ($sort && $order) {
            $queryBuilder = $queryBuilder->orderBy($sort, $order);
        }
        return $queryBuilder->paginate($limit);
    }

    public function findBySlug($slug)
    {
        return $this->model->query()
            ->where('slug', $slug)
            ->where('status', CommonStatus::ACTIVE)
            ->with(['category', 'options'])->first();
    }
}
