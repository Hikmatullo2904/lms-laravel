<?php

namespace App\Providers;

use App\Repositories\Contracts\CourseSectionRepositoryInterface;
use App\Repositories\Impl\CategoryRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Impl\CourseRepository;
use App\Repositories\Contracts\CourseRepositoryInterface;
use App\Repositories\Impl\CourseSectionRepository;
use App\Repositories\Impl\PermissionRepository;
use App\Repositories\Contracts\PermissionRepositoryInterface;
use App\Repositories\Impl\RoleRepository;
use App\Repositories\Contracts\RoleRepositoryInterface;
use App\Repositories\Impl\UserRepository;
use App\Repositories\Contracts\UserRepositoryInterface;
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
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
        $this->app->bind(CourseSectionRepositoryInterface::class, CourseSectionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
