<?php

namespace Mgamal92\FilamentDebugActions;

use Illuminate\Support\ServiceProvider;

class FilamentDebugActionsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/filament-debug-actions.php' => config_path('filament-debug-actions.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__.'/../config/filament-debug-actions.php', 'filament-debug-actions');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'filament-debug-actions');
    }

    public function register(): void
    {

    }
}