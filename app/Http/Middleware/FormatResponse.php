<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Psy\Util\Json;
use Symfony\Component\HttpFoundation\JsonResponse;

class FormatResponse
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * @var Response $res
         */
        $res = $next($request);
        $resData = $res->original;
        if (is_array($resData) || $resData instanceof Collection || is_object($resData) || $resData instanceof Model) {
            if (array_key_exists('data', $resData) || array_key_exists('status', $resData) || array_key_exists('message', $resData)) {
                return $res;
            }
            return response_success($resData);
        }
        return $res;
    }
}
