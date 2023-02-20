<?php

namespace App\Providers;

use Carbon\Laravel\ServiceProvider;
use App\Repositories\ISettingRepository;
use App\Repositories\SettingRepository;
use App\Repositories\IUserRepository;
use App\Repositories\UserRepository;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\TestimonialRepositoryInterface;
use App\Repositories\TestimonialRepository;


class RepositoryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(ISettingRepository::class, SettingRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(TestimonialRepositoryInterface::class, TestimonialRepository::class);
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
