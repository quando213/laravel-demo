<?php


namespace App\Repositories\Eloquent;


use App\Models\Product;
use App\Repositories\AbstractBaseRepository;
use App\Repositories\Interfaces\ProductRepository;
use Illuminate\Database\Eloquent\Builder;

class ProductRepositoryImp extends AbstractBaseRepository implements ProductRepository
{
    protected $modelClass = Product::class;

    public function find($search, $status, $category_id)
    {
        $queryBuilder = $this->model->query();
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
        return $queryBuilder->get();
    }
}
