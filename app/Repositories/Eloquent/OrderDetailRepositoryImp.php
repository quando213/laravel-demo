<?php


namespace App\Repositories\Eloquent;


use App\Models\OrderDetail;
use App\Repositories\AbstractBaseRepository;
use App\Repositories\Interfaces\OrderDetailRepository;

class OrderDetailRepositoryImp extends AbstractBaseRepository implements OrderDetailRepository
{
    protected $modelClass = OrderDetail::class;
}
