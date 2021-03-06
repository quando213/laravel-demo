<?php


namespace App\Repositories\Eloquent;


use App\Models\User;
use App\Repositories\AbstractBaseRepository;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Database\Eloquent\Builder;

class UserRepositoryImp extends AbstractBaseRepository implements UserRepository
{
    protected $modelClass = User::class;

    public function find($search, $status, $limit)
    {
        $queryBuilder = $this->model->query();
        if ($search) {
            $queryBuilder = $queryBuilder->where(function (Builder $q) use ($search) {
                return $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            });
        }
        if ($status) {
            $queryBuilder = $queryBuilder->where('status', $status);
        }
        return $queryBuilder->paginate($limit);
    }
}
