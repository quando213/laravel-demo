<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Services\Interfaces\ColorService;

class AdminColorController extends Controller
{
    private $colorService;
    public function __construct(ColorService $colorService)
    {
        $this->colorService = $colorService;
    }

    public function list()
    {
        return $this->colorService->list();
    }

    public function store(ColorRequest $request)
    {
        return $this->colorService->store($request->validated());
    }

    public function detail($id)
    {
        return $this->colorService->detail($id);
    }

    public function save(ColorRequest $request, $id)
    {
        return $this->colorService->save($request->validated(), $id);
    }

    public function delete($id)
    {
        return $this->colorService->delete($id);
    }
}
