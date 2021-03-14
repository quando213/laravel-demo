<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Validation\ValidationException;

function response_success($data)
{
    $result = [
        'status' => 1,
        'message' => 'Success',
        'data' => $data,
    ];
    if ($data instanceof LengthAwarePaginator) {
        $result['meta'] = get_meta($data);
        $result['data'] = $data->items();
    }
    return response()->json($result);
}

function response_error(Throwable $err, $status = 404)
{
    $result = [
        'status' => 0,
        'message' => $err->getMessage()
    ];
    if ($err instanceof ValidationException) {
        $status = 400;
        $result['message'] = $err->validator->errors()->first();
    }
    if ($err instanceof AuthenticationException) {
        $status = 401;
    }
    return response()->json($result, $status);
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

function lib_assets($path) {
    return asset('libs/'.$path);
}

function response_web($value) {
    if (is_array($value)) {
        return collect($value)->map(function ($item) {
            return (object) $item->toArray();
        });
    } else {
        return (object) $value->toArray();
    }
}
