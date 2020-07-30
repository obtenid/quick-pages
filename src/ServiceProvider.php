<?php

namespace Obtenid\QuickPages;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/pages.php' => config_path('pages.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function name() {
        return 'Obtenid\QuickPages';
    }
}