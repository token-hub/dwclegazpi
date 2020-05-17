<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Entities\Role' => 'App\Policies\RolePolicy',
        'App\Models\Entities\User' => 'App\Policies\UserPolicy',
        'App\Models\Entities\Permission' => 'App\Policies\PermissionPolicy',
        'App\Models\Entities\Image' => 'App\Policies\ImagePolicy',
        'Spatie\Activitylog\Models\Activity' => 'App\Policies\LogPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
