<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Services\Interfaces\OptionService;
use Illuminate\Http\Request;

class AdminOptionController extends Controller
{
    private $optionService;
    public function __construct(OptionService $optionService)
    {
        $this->optionService = $optionService;
    }

    public function list(Request $request)
    {
        $product_id = $request->query('product_id');
        $color_id = $request->query('color_id');
        $size_id = $request->query('size_id');
        return $this->optionService->list($product_id, $color_id, $size_id);
    }

    public function store(OptionRequest $request)
    {
        return $this->optionService->store($request->validated());
    }

    public function detail($id)
    {
        return $this->optionService->detail($id);
    }

    public function save(OptionRequest $request, $id)
    {
        return $this->optionService->save($request->validated(), $id);
    }

    public function delete($id)
    {
        return $this->optionService->delete($id);
    }
}
