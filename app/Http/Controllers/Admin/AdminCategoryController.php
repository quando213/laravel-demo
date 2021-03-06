<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\Interfaces\CategoryService;

class AdminCategoryController extends Controller
{
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function list()
    {
        return $this->categoryService->list();
    }

    public function store(CategoryRequest $request)
    {
        return $this->categoryService->store($request->validated());
    }

    public function detail($id)
    {
        return $this->categoryService->detail($id);
    }

    public function save(CategoryRequest $request, $id)
    {
        return $this->categoryService->save($request->validated(), $id);
    }

    public function delete($id)
    {
        return $this->categoryService->delete($id);
    }
}
