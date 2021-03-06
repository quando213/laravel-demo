<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\Interfaces\DtoService;
use App\Services\Interfaces\UserService;
use Illuminate\Http\Request;


class AdminUserController extends Controller
{
    private $userService;
    private $dtoService;

    public function __construct(UserService $userService, DtoService $dtoService)
    {
        $this->userService = $userService;
        $this->dtoService = $dtoService;
    }

    public function list(Request $request)
    {
        $search = $request->query('search');
        $status = $request->query('status');
        $limit = $request->query('limit') ? $request->query('limit') : 5;
        $result = $this->userService->list($search, $status, $limit);
        return response_success($result->map(function ($item) {
            return $this->dtoService->userDto($item);
        }), get_meta($result));
    }

    public function store(UserRequest $request)
    {
        return $this->userService->store($request->validated());
    }

    public function detail($id)
    {
        return $this->userService->detail($id);
    }

    public function save(UserRequest $request, $id)
    {
        return $this->userService->save($request->validated(), $id);
    }

    public function delete($id)
    {
        return $this->userService->delete($id);
    }
}
