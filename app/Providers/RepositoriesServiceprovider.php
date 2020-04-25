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

         // $this->app
         // ->when(UserController::class)
         // ->needs(RepositoryInterface::class)
         // ->give(UserRepository::class);

         // $this->app
         // ->when(ProfileController::class)
         // ->needs(RepositoryInterface::class)
         // ->give(ProfileRepository::class);
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
