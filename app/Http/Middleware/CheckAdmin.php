<?php

namespace App\Http\Middleware;

use App\Enums\CommonStatus;
use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->status != CommonStatus::ACTIVE || Auth::user()->role !== Role::ADMIN) {
            abort(403, 'Access denied');
        } else {
            return $next($request);
        }
    }
}
