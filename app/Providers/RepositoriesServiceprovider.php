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

        $this->app->bind(\App\Models\Repositories\ImageInterface::class, \App\Models\Repositories\Eloquent\ImageRepository::class);

        $this->app->bind(\App\Models\Repositories\RoleInterface::class, \App\Models\Repositories\Eloquent\RoleRepository::class);

        $this->app->bind(\App\Models\Repositories\PermissionInterface::class, \App\Models\Repositories\Eloquent\PermissionRepository::class);
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
