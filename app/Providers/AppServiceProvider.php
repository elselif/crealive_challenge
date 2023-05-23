<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();


        $categories = Category::with('rSubCategory')->where('show_on_menu','Show')->orderBy('category_order','asc')->get();

        view()->share('global_categories', $categories);

    }
}
