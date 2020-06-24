<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Models\Services\UpdateService;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UpdateService $updateService)
    {
       \Illuminate\Support\Facades\Schema::defaultStringLength(191); 
       
       $latestUpcoming = [
                            'latestPosts' => $updateService->updateLatestPostsData(),
                            'upcomingEvents' => $updateService->updateUpcomingEventsData(),
                        ];

       View::share('latestUpcoming', $latestUpcoming);
    }
}