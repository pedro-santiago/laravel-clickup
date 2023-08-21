<?php

namespace PedroSantiago\LaravelClickup;

use Illuminate\Support\ServiceProvider;

class ClickupServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        // Register the main class to use with the facade
        $this->app->singleton(
            Clickup::class,
            fn ($app) => new Clickup($app['config']['services']['clickup']['token'])
        );
    }
}
