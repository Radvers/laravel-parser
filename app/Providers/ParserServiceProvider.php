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
        $this->app->bind('App\Contracts\ScenarioInterface', 'App\Services\Scenarios\BaskinoScenario');
        $this->app->bind('App\Contracts\ParserInterface', 'App\Adapters\ParserAdapter');
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
