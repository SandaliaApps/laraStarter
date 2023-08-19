<?php

namespace SandaliaApps\LaraStarter;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class LaraStarterServiceProvider extends ServiceProvider
{
    public function boot()
    {   // Load package routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        // Load package views
        $this->loadViewsFrom(__DIR__ . '/resources/views','laraStarter');
        // Load package migrations
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->publishes([__DIR__.'/config/laraStarter.php' => config_path('laraStarter.php') ]);
        $this->publishes([__DIR__.'/public/assets' => public_path('vendor/laraStarter'),], 'public');
        $this->publishes([__DIR__.'/resources/views' => resource_path('views/vendor/laraStarter'),]);
        $this->publishes([__DIR__.'/database/migrations/' => database_path('migrations')], 'laraStarter-migrations');

        // Will use the SessionGuard driver with the admins provider
        Config::set('auth.guards.admin', [
            'driver' => 'session',
            'provider' => 'admins',
        ]);

        // Will use the EloquentUserProvider driver with the Admin model
        Config::set('auth.providers.admins', [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ]);

        // Will use the EloquentUserProvider driver with the Admin model
        Config::set(['auth.providers.users.model' => App\Models\User::class]);
    }

    public function register()
    {
        // Register 'admin' middleware to Kernel.php
        $this->app['router']->aliasMiddleware('admin' , App\Http\Middleware\Admin::class);

        // Register 'manager' middleware to Kernel.php
        $this->app['router']->aliasMiddleware('manager' , App\Http\Middleware\Manager::class);

        // Register 'customer' middleware to Kernel.php
        $this->app['router']->aliasMiddleware('customer' , App\Http\Middleware\Customer::class);

        //$this->app->register(App\Providers\RouteServiceProvider::class);

        // Merge Configs from package
        $this->mergeConfigFrom(__DIR__.'/config/laraStarter.php', 'laraStarter');

    }
}