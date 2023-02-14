<?php

namespace App\Providers;

use App\Repositories\AttributeRepository;
use App\Repositories\IAttributeRepository;
use App\Repositories\ISettingRepository;
use App\Repositories\IUserRepository;
use App\Repositories\SettingRepository;
use App\Repositories\UserRepository;
use Carbon\Laravel\ServiceProvider;

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
        $this->app->bind(IAttributeRepository::class, AttributeRepository::class);
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
