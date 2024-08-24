<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        // Use a view composer to share settings with all views
        View::composer('*', function ($view) {
            $settings = Setting::where('user_id', 1)->first(); // Assuming the user with ID 1
            $view->with('settings', $settings);
        });
    }
}
