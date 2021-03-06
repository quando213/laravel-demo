<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Services\Interfaces\OrderService;

class AdminOrderController extends Controller
{
    private $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function list()
    {
        return $this->orderService->list();
    }

    public function store(OrderRequest $request)
    {
        return $this->orderService->store($request->validated());
    }

    public function detail($id)
    {
        return $this->orderService->detail($id);
    }

    public function save(OrderRequest $request, $id)
    {
        return $this->orderService->save($request->validated(), $id);
    }

    public function delete($id)
    {
        return $this->orderService->delete($id);
    }
}
