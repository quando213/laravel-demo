<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SizeRequest;
use App\Services\Interfaces\SizeService;

class AdminSizeController extends Controller
{
    private $sizeService;
    public function __construct(SizeService $sizeService)
    {
        $this->sizeService = $sizeService;
    }

    public function list()
    {
        return $this->sizeService->list();
    }

    public function findByCategory($category_id)
    {
        return $this->sizeService->findByCategory($category_id);
    }

    public function store(SizeRequest $request)
    {
        return $this->sizeService->store($request->validated());
    }

    public function detail($id)
    {
        return $this->sizeService->detail($id);
    }

    public function save(SizeRequest $request, $id)
    {
        return $this->sizeService->save($request->validated(), $id);
    }

    public function delete($id)
    {
        return $this->sizeService->delete($id);
    }
}
