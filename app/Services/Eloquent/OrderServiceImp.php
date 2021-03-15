<?php


namespace App\Services\Eloquent;

use App\Repositories\Interfaces\OptionRepository;
use App\Repositories\Interfaces\OrderDetailRepository;
use App\Repositories\Interfaces\OrderRepository;
use App\Services\Interfaces\OrderService;
use Illuminate\Support\Str;

class OrderServiceImp implements OrderService
{
    private $orderRepository;
    private $orderDetailRepository;
    private $optionRepository;

    public function __construct(OrderRepository $orderRepository, OrderDetailRepository $orderDetailRepository, OptionRepository $optionRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->optionRepository = $optionRepository;
    }

    public function list()
    {
        return $this->orderRepository->findAll();
    }

    public function store($data)
    {
        $data['id'] = $this->generateOrderId();
        $data['total_price'] = 0;
        $details = $data['details'];
        foreach ($details as $detail) {
            $option = $this->optionRepository->findById($detail['option_id']);
            if ($option->quantity < $detail['quantity']) {
                throw new \Error('Số lượng sản phẩm không đủ');
            }
            $detail['product_id'] = $option->product_id;
            $detail['order_id'] = $data['id'];
            $detail['unit_price'] = $option->product->price;
            $data['total_price'] += $detail['unit_price'] * $detail['quantity'];
            $this->orderDetailRepository->create($detail);
        }
        $newOrder = $this->orderRepository->create($data);
        foreach ($details as $detail) {
            $this->optionRepository->findById($detail['option_id'])->decrement('quantity', $detail['quantity']);
        }
        return $newOrder;
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
