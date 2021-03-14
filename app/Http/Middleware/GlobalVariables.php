<?php


namespace App\Http\Middleware;


use App\Services\Interfaces\CategoryService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class GlobalVariables
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function handle(Request $request, Closure $next)
    {
        $categories = $this->categoryService->list();
        View::share('categories', $categories);
        return $next($request);
    }
}
