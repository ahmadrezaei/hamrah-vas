<?php

namespace Alirezadp10\Hamrahvas;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Publishes configuration file.
     *
     * @return  void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/hamrahvas.php' => config_path('hamrahvas.php'),
        ]);
    }

    /**
     * Make config publishment optional by merging the config from the package.
     *
     * @return  void
     */
    public function register()
    {
        $this->app->bind(Hamrahvas::class, function ($app) {
            return new Hamrahvas(config('hamrahvas'));
        });

    }
}