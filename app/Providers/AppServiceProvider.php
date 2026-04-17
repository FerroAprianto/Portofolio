<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- Tambahan 1: Panggil fitur URL

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
        // <-- Tambahan 2: Paksa pakai HTTPS kalau di server production
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}