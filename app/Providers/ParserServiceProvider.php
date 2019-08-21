<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ParserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Utils\Contracts\ScenarioInterface', 'App\Services\Scenarios\BaskinoScenario');
        $this->app->bind('App\Utils\Contracts\ParserInterface', 'App\Utils\Adapters\ParserAdapter');
        $this->app->bind('App\Utils\Contracts\ConfigLoaderInterface', 'App\Utils\Adapters\LaravelConfigLoader');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
