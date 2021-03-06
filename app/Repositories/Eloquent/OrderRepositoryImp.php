<?php


namespace App\Repositories\Eloquent;


use App\Models\Order;
use App\Repositories\AbstractBaseRepository;
use App\Repositories\Interfaces\OrderRepository;

class OrderRepositoryImp extends AbstractBaseRepository implements OrderRepository
{
    protected $modelClass = Order::class;
}
