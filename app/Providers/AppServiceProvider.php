<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\HolidayRepository;
use App\Repositories\Interfaces\HolidayRepositoryInterface;
use App\Repositories\LeaveRepository;
use App\Repositories\Interfaces\LeaveRepositoryInterface;
use App\Repositories\EventRepository;
use App\Repositories\Interfaces\EventRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(HolidayRepositoryInterface::class, HolidayRepository::class);
        $this->app->bind(LeaveRepositoryInterface::class, LeaveRepository::class);
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
