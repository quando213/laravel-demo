<?php


namespace App\Http\Controllers\Web;


use App\Enums\CommonStatus;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\CategoryService;
use App\Services\Interfaces\ColorService;
use App\Services\Interfaces\ProductService;
use App\Services\Interfaces\RegionService;
use App\Services\Interfaces\SizeService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class WebController extends Controller
{
    private $productService;
    private $categoryService;
    private $sizeService;
    private $colorService;
    private $regionService;

    public function __construct(ProductService $productService, CategoryService $categoryService, SizeService $sizeService, ColorService $colorService, RegionService $regionService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->sizeService = $sizeService;
        $this->colorService = $colorService;
        $this->regionService = $regionService;
    }

    public function index()
    {
        $status = CommonStatus::ACTIVE;
        $limit = 20;
        $topProducts = response_web($this->productService->list(null, $status, $limit, null)->items());
        return view('index', ['topProducts' => $topProducts]);
    }

    public function category(Request $request, $categorySlug)
    {
        $size = null;
        if ($request->query('size')) {
            $size = explode(',', $request->query('size'));
        }
        $color = null;
        if ($request->query('color')) {
            $color = explode(',', $request->query('color'));
        }
        $price_min = $request->query('price_min');
        $price_max = $request->query('price_max');
        $sort = $request->query('sort');
        $order = $request->query('order');
        $category = $this->categoryService->findBySlug($categorySlug);
        $products = response_web($this->productService->list(null, CommonStatus::ACTIVE, null, $category->id, $size, $color, $price_min, $price_max, $sort, $order)->items());
        $sizes = $this->sizeService->list();
        $colors = $this->colorService->list();
        return view('category', [
            'category' => $category,
            'products' => $products,
            'sizes' => $sizes,
            'colors' => $colors,
        ]);
    }

    public function product($categorySlug, $productSlug)
    {
        $product = $this->productService->findBySlug($productSlug);
        if ($product->category->slug !== $categorySlug) {
            throw new NotFoundHttpException();
        }
        $product = response_web($product);
        $related_products = response_web($this->productService->list(null, CommonStatus::ACTIVE, 4, $product->category_id)->items());
        return view('product', [
            'product' => $product,
            'related_products' => $related_products,
        ]);
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        $cities = $this->regionService->getCities();
        return view('checkout', [
            'cities' => $cities,
        ]);
    }
}
