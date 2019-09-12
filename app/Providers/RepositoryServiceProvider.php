<?php

namespace App\Providers;


use App\Utils\Contracts\Repository\Movie;
use App\Utils\Repositories\Laravel\Repos\Movie as MovieRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Movie::class, MovieRepo::class);
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
