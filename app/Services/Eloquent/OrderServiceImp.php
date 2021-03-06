<?php


namespace App\Services\Eloquent;

use App\Repositories\Interfaces\OrderRepository;
use App\Services\Interfaces\OrderService;
use Illuminate\Support\Str;

class OrderServiceImp implements OrderService
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function list()
    {
        return $this->orderRepository->findAll();
    }

    public function store($data)
    {
        $data['id'] = $this->generateOrderId();
        return $this->orderRepository->create($data);
    }

    public function detail($id)
    {
        return $this->orderRepository->findById($id);
    }

    public function save($data, $id)
    {
        return $this->orderRepository->findByIdAndUpdate($data, $id);
    }

    public function delete($id)
    {
        return $this->orderRepository->findByIdAndDelete($id);
    }

    public function generateOrderId()
    {
        $id = strtoupper(Str::random(10));
        if ($this->orderRepository->exists($id, 'id')) {
            $this->generateOrderId();
        }
        return $id;
    }
}
