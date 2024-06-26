<?php

namespace App\Providers;

use App\Repositories\ClassAttendanceLogRepository;
use App\Repositories\ClassAttendanceRepository;
use App\Repositories\EventRepository;
use App\Repositories\EventUserRepository;
use App\Repositories\Interface\IClassAttendanceLogRepository;
use App\Repositories\Interface\IClassAttendanceRepository;
use App\Repositories\Interface\IEventRepository;
use App\Repositories\Interface\IEventUserRepository;
use App\Repositories\Interface\ILogRepository;
use App\Repositories\Interface\IUserRepository;
use App\Repositories\LogRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            IUserRepository::class,
            UserRepository::class
        );
        $this->app->bind(
            IEventRepository::class,
            EventRepository::class
        );
        $this->app->bind(
            ILogRepository::class,
            LogRepository::class
        );
        $this->app->bind(
            IEventUserRepository::class,
            EventUserRepository::class
        );
        $this->app->bind(
            IClassAttendanceRepository::class,
            ClassAttendanceRepository::class
        );
        $this->app->bind(
            IClassAttendanceLogRepository::class,
            ClassAttendanceLogRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
