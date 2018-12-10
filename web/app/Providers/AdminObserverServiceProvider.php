<?php

namespace OdontoInn\Providers;

use Illuminate\Support\ServiceProvider;
use OdontoInn\Models\User;
use OdontoInn\Observers\Admin\Settings\UserObserver;

class AdminObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
