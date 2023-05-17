<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.my_site');

        require base_path('app/Servises/functions.php');

        $this->loadMigrationsFrom([
            'database/migrations/1_base',
            'database/migrations/2_categories_product',
            'database/migrations/3_products',
            'database/migrations/4_reviews',
            'database/migrations/5_feedback',
            'database/migrations/6_pages',
            'database/migrations/7_menu',
        ]);
    }
}
