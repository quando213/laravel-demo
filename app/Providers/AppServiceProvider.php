<?php

namespace App\Providers;

use App\Repositories\Eloquent\CategoryRepositoryImp;
use App\Repositories\Eloquent\ColorRepositoryImp;
use App\Repositories\Eloquent\OptionRepositoryImp;
use App\Repositories\Eloquent\OrderDetailRepositoryImp;
use App\Repositories\Eloquent\OrderRepositoryImp;
use App\Repositories\Eloquent\ProductRepositoryImp;
use App\Repositories\Eloquent\RegionRepositoryImp;
use App\Repositories\Eloquent\SizeRepositoryImp;
use App\Repositories\Interfaces\CategoryRepository;
use App\Repositories\Interfaces\ColorRepository;
use App\Repositories\Interfaces\OptionRepository;
use App\Repositories\Interfaces\OrderDetailRepository;
use App\Repositories\Interfaces\OrderRepository;
use App\Repositories\Interfaces\ProductRepository;
use App\Repositories\Interfaces\RegionRepository;
use App\Repositories\Interfaces\SizeRepository;
use App\Repositories\Interfaces\UserRepository;
use App\Repositories\Eloquent\UserRepositoryImp;
use App\Services\Eloquent\CategoryServiceImp;
use App\Services\Eloquent\ColorServiceImp;
use App\Services\Eloquent\FileServiceImp;
use App\Services\Eloquent\OptionServiceImp;
use App\Services\Eloquent\OrderDetailServiceImp;
use App\Services\Eloquent\OrderServiceImp;
use App\Services\Eloquent\ProductServiceImp;
use App\Services\Eloquent\RegionServiceImp;
use App\Services\Eloquent\SizeServiceImp;
use App\Services\Interfaces\CategoryService;
use App\Services\Interfaces\ColorService;
use App\Services\Interfaces\FileService;
use App\Services\Interfaces\OptionService;
use App\Services\Interfaces\OrderDetailService;
use App\Services\Interfaces\OrderService;
use App\Services\Interfaces\ProductService;
use App\Services\Interfaces\RegionService;
use App\Services\Interfaces\SizeService;
use App\Services\Interfaces\UserService;
use App\Services\Eloquent\UserServiceImp;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        UserRepository::class => UserRepositoryImp::class,
        UserService::class => UserServiceImp::class,
        CategoryRepository::class => CategoryRepositoryImp::class,
        CategoryService::class => CategoryServiceImp::class,
        SizeRepository::class => SizeRepositoryImp::class,
        SizeService::class => SizeServiceImp::class,
        ColorRepository::class => ColorRepositoryImp::class,
        ColorService::class => ColorServiceImp::class,
        RegionRepository::class => RegionRepositoryImp::class,
        RegionService::class => RegionServiceImp::class,
        ProductRepository::class => ProductRepositoryImp::class,
        ProductService::class => ProductServiceImp::class,
        OptionRepository::class => OptionRepositoryImp::class,
        OptionService::class => OptionServiceImp::class,
        FileService::class => FileServiceImp::class,
        OrderRepository::class => OrderRepositoryImp::class,
        OrderService::class => OrderServiceImp::class,
        OrderDetailRepository::class => OrderDetailRepositoryImp::class,
        OrderDetailService::class => OrderDetailServiceImp::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
