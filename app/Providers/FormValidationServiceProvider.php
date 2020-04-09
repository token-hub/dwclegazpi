<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->call([$this, 'registerFormValidationServiceProvider']);
    }

    public function registerFormValidationServiceProvider($id)
    {
        $this->app->bind('App\Http\Requests\FormValidation', function() use ($id)
        {
            return new FormValidation($id);
        });
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
