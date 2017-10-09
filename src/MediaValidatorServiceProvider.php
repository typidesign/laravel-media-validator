<?php

namespace Typidesign\MediaValidator;

use Illuminate\Support\ServiceProvider;

class MediaValidatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/media-validator.php' => config_path('media-validator.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/media-validator.php', 'media-validator');
    }
}
