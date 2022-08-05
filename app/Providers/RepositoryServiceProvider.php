<?php

namespace App\Providers;

use Src\Application\Repositories\ProductsRepository;
use Src\Infrastructure\Persistence\DoctrineProductsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ProductsRepository::class, DoctrineProductsRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
