<?php

namespace App\Providers;

use App\Repositories\EventRepository;
use App\Repositories\GeneralPurposeRepository;
use App\Repositories\Interface\IEventRepository;
use App\Repositories\Interface\IGeneralPurposeRepository;
use App\Repositories\Interface\IUserRepository;
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
            IGeneralPurposeRepository::class,
            GeneralPurposeRepository::class
        );
        $this->app->bind(
            IEventRepository::class,
            EventRepository::class
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
