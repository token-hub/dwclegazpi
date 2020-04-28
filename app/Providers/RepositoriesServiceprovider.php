<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceprovider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Models\Repositories\UserInterface::class, \App\Models\Repositories\Eloquent\UserRepository::class);

        $this->app->bind(\App\Models\Repositories\LogInterface::class, \App\Models\Repositories\Eloquent\LogRepository::class);
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
