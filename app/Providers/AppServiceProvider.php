<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\PermissionRepository;
use App\Repositories\PermissionRepositoryInterface;
use App\Repositories\RoleRepository;
use App\Repositories\RoleRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind( CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
