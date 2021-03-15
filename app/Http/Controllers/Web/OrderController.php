<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Services\Interfaces\OrderService;

class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function create(OrderRequest $orderRequest)
    {
        return $this->orderService->store($orderRequest->validated());
    }
}
