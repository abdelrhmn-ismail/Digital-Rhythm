<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function ($view) {
            $view->with('siteTitle', __(\App\Helpers\SettingsHelper::siteTitle()));
            $view->with('siteLogo', \App\Helpers\SettingsHelper::siteLogo());
            $view->with('siteFavicon', \App\Helpers\SettingsHelper::favicon());
        });
    }
}
