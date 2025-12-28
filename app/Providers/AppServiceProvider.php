<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
{
    $this->app->bind('path.public', function() {
        return base_path();
    });
}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->share('waNumber', \App\Models\Setting::where('key', 'wa_number')->first());
        view()->share('waMessage', \App\Models\Setting::where('key', 'wa_message')->first());
    }
}
