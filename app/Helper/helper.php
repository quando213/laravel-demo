<?php

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Validation\ValidationException;

function response_success($data, $meta = null)
{
    $result = [
        'status' => 1,
        'message' => 'Success',
        'data' => $data,
    ];
    if ($meta) {
        $result['meta'] = $meta;
    }
    return response()->json($result);
}

function response_error(Throwable $err)
{
    $result = [
        'status' => 0,
        'message' => $err->getMessage()
    ];
    if ($err instanceof ValidationException)
        $result['message'] = $err->validator->errors()->first();
    return response()->json($result);
}

function get_meta(LengthAwarePaginator $paginate) {
    $paginate->appends(request()->query());
    return [
        'total' => $paginate->total(),
        'limit' => (int)$paginate->perPage(),
        'current_page' => $paginate->currentPage(),
        'total_page' => round($paginate->total() / $paginate->perPage()),
    ];
}
