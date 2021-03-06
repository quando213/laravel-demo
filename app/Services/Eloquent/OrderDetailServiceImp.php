<?php


namespace App\Services\Eloquent;

use App\Repositories\Interfaces\OrderDetailRepository;
use App\Services\Interfaces\OrderDetailService;

class OrderDetailServiceImp implements OrderDetailService
{
    private $orderDetailRepository;

    public function __construct(OrderDetailRepository $orderDetailRepository)
    {
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function list()
    {
        return $this->orderDetailRepository->findAll();
    }

    public function store($data)
    {
        return $this->orderDetailRepository->create($data);
    }

    public function detail($id)
    {
        return $this->orderDetailRepository->findById($id);
    }

    public function save($data, $id)
    {
        return $this->orderDetailRepository->findByIdAndUpdate($data, $id);
    }

    public function delete($id)
    {
        return $this->orderDetailRepository->findByIdAndDelete($id);
    }
}
