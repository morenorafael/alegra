<?php

namespace Morenorafael\Alegra\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use Morenorafael\Alegra\AlegraManager;

class AlegraServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/alegra.php', 'alegra'
        );

        $this->app->bind('alegra', function (Application $app) {
            $config = $app['config']->get('alegra');

            $http = Http::baseUrl($config['url'])
                ->withBasicAuth($config['username'], $config['token'])
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-type' => 'application/json',
                ]);

            return new AlegraManager($http);
        });

        $this->app->bind('alegra.controller', fn (Application $app) => $app['alegra']->driver());
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/alegra.php' => config_path('alegra.php'),
        ], 'alegra-config');
    }

    public function provides()
    {
        return [
            'alegra', 'alegra.controller',
        ];
    }
}
