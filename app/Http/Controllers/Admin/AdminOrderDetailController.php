<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderDetailRequest;
use App\Services\Interfaces\OrderDetailService;

class AdminOrderDetailController extends Controller
{
    private $orderDetailService;
    public function __construct(OrderDetailService $orderDetailService)
    {
        $this->orderDetailService = $orderDetailService;
    }

    public function list()
    {
        return $this->orderDetailService->list();
    }

    public function store(OrderDetailRequest $request)
    {
        return $this->orderDetailService->store($request->validated());
    }

    public function detail($id)
    {
        return $this->orderDetailService->detail($id);
    }

    public function save(OrderDetailRequest $request, $id)
    {
        return $this->orderDetailService->save($request->validated(), $id);
    }

    public function delete($id)
    {
        return $this->orderDetailService->delete($id);
    }
}
