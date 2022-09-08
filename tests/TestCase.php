<?php

namespace MorenoRafael\Alegra\Tests;

use Morenorafael\Alegra\Facades\Alegra;
use Morenorafael\Alegra\Providers\AlegraServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array<int, string>
     */
    protected function getPackageProviders($app)
    {
        return [
            AlegraServiceProvider::class,
        ];
    }

    /**
     * Override application aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array<string, string>
     */
    protected function getPackageAliases($app)
    {
        return [
            'Alegra' => Alegra::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function defineEnvironment($app)
    {
        $app['config']->set('alegra.url', 'https://api.alegra.com/api/v1');
        $app['config']->set('alegra.username', 'alejandro8924+1@gmail.com');
        $app['config']->set('alegra.token', '31c7102bb36ebd9264fe');
    }
}
