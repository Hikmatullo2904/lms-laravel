<?php

namespace App\Providers;

use App\Repositories\Contracts\ChatMessageRepositoryInterface;
use App\Repositories\Contracts\ChatRepositoryInterface;
use App\Repositories\Contracts\CourseReviewRepositoryInterface;
use App\Repositories\Contracts\CourseSectionRepositoryInterface;
use App\Repositories\Contracts\LessonRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\StudentCourseRepositoryInterface;
use App\Repositories\Impl\CategoryRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Impl\ChatMessageRepository;
use App\Repositories\Impl\ChatRepository;
use App\Repositories\Impl\CourseRepository;
use App\Repositories\Contracts\CourseRepositoryInterface;
use App\Repositories\Impl\CourseReviewRepository;
use App\Repositories\Impl\CourseSectionRepository;
use App\Repositories\Impl\LessonRepository;
use App\Repositories\Impl\OrderRepository;
use App\Repositories\Impl\PermissionRepository;
use App\Repositories\Contracts\PermissionRepositoryInterface;
use App\Repositories\Impl\RoleRepository;
use App\Repositories\Contracts\RoleRepositoryInterface;
use App\Repositories\Impl\StudentCourseRepository;
use App\Repositories\Impl\UserRepository;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

use Dedoc\Scramble\Scramble;
use Dedoc\Scramble\Support\Generator\OpenApi;
use Dedoc\Scramble\Support\Generator\SecurityScheme;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
        $this->app->bind(CourseSectionRepositoryInterface::class, CourseSectionRepository::class);
        $this->app->bind(LessonRepositoryInterface::class, LessonRepository::class);
        $this->app->bind(CourseReviewRepositoryInterface::class, CourseReviewRepository::class);
        $this->app->bind(ChatRepositoryInterface::class, ChatRepository::class);
        $this->app->bind(ChatMessageRepositoryInterface::class, ChatMessageRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(StudentCourseRepositoryInterface::class, StudentCourseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Scramble::afterOpenApiGenerated(function (OpenApi $openApi) {
            $openApi->secure(
                SecurityScheme::http('bearer', 'JWT')
            );
        });
    }
}
