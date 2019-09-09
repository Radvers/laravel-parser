<?php

namespace App\Providers;

use App\Utils\Adapters\LaravelObjectCreator;
use App\Utils\Contracts\ObjectCreator;
use App\Utils\Parser\Scenarios\BaskinoScenario;
use App\Utils\Adapters\LaravelConfigLoader;
use App\Utils\Contracts\ConfigLoader;
use App\Utils\Contracts\Scrapper as ScrapperInterface;
use App\Utils\Contracts\Scenario;
use App\Utils\Adapters\Scrapper;
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
        $this->app->bind(Scenario::class, BaskinoScenario::class);
        $this->app->bind(ScrapperInterface::class, Scrapper::class);
        $this->app->bind(ConfigLoader::class, LaravelConfigLoader::class);
        $this->app->bind(ObjectCreator::class, LaravelObjectCreator::class);
        //$this->app->when();
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
