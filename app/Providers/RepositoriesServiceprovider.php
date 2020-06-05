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

        $this->app->bind(\App\Models\Repositories\SlideInterface::class, \App\Models\Repositories\Eloquent\SlideRepository::class);

        $this->app->bind(\App\Models\Repositories\RoleInterface::class, \App\Models\Repositories\Eloquent\RoleRepository::class);

        $this->app->bind(\App\Models\Repositories\PermissionInterface::class, \App\Models\Repositories\Eloquent\PermissionRepository::class);

        $this->app->bind(\App\Models\Repositories\UpdateInterface::class, \App\Models\Repositories\Eloquent\UpdateRepository::class);
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
