<?php

namespace App\Providers;

use App\Repositories\GeneralPurposeRepository;
use App\Repositories\Interface\IGeneralPurposeRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            IGeneralPurposeRepository::class,
            GeneralPurposeRepository::class
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
