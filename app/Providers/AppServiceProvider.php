<?php

namespace App\Providers;

use App\Models\State;
use App\Observers\SlugObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        State::observe(SlugObserver::class);
    }
}
