<?php

declare(strict_types=1);

namespace ModelTools;

use Illuminate\Bus\BusServiceProvider;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\ServiceProvider;

class ModelToolsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/model-tools.php' => config_path('model-tools.php'),
        ], 'model-tools-config');
    }

    public function register(): void
    {
        if (! $this->app->bound(Dispatcher::class)) {
            $this->app->register(BusServiceProvider::class);
        }

        $this->mergeConfigFrom(
            __DIR__ . '/../config/model-tools.php',
            'model-tools'
        );
    }
}
