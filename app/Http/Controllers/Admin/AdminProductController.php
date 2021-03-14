<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\Interfaces\ProductService;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    private $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function list(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $limit = $request->query('limit') ? $request->query('limit') : 10;
        $category_id = $request->input('category_id');
        return $this->productService->list($search, $status, $limit, $category_id);
    }

    public function store(ProductRequest $request)
    {
        return $this->productService->store($request->validated());
    }

    public function detail($id)
    {
        return $this->productService->detail($id);
    }

    public function save(ProductRequest $request, $id)
    {
        return $this->productService->save($request->validated(), $id);
    }

    public function delete($id)
    {
        return $this->productService->delete($id);
    }
}
