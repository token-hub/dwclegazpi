<?php

namespace Tests\Feature\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Entities\User;
use App\Models\Entities\Update;
use App\Models\Entities\Role;
use App\Models\Entities\Permission;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_visit_update_index_page()    
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::whereIn('title', ['add updates', 'update updates', 'delete updates'])->pluck('id')->toArray();
        
       # get user permissions id
        $userPermission = $user->roles
                        ->flatmap(function($role) use ($permissionsId) {
                            $role->permissions()->attach($permissionsId);
                            return [Role::find($role->id)->permissions->pluck('id')->toArray()];
                        })->flatmap(function($role){
                            return !empty($role) ? $role :'';
                        })->toArray();

        # check if user has permissions to access
        $this->assertTrue(count(array_intersect($permissionsId, $userPermission)) > 0);

        $this->actingAs($user)
            ->get('/dashboard/updates')
            ->assertSee('Updates');
    }

    public function test_authenticated_user_can_create_updates()
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::where('title', 'add updates')->pluck('id')->toArray();
        
       # get user permissions id
        $userPermission = $user->roles
                        ->flatmap(function($role) use ($permissionsId) {
                            $role->permissions()->attach($permissionsId);
                            return [Role::find($role->id)->permissions->pluck('id')->toArray()];
                        })->flatmap(function($role){
                            return !empty($role) ? $role :'';
                        })->toArray();

        # check if user has permissions to access
        $this->assertTrue(count(array_intersect($permissionsId, $userPermission)) > 0);

        $this->actingAs($user)
            ->get('/dashboard/updates/create')
            ->assertSee('Add Updates');
    }

    public function test_authenticated_user_can_store_updates()
    {
        $this->withoutExceptionHandling();
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::where('title', 'add updates')->pluck('id')->toArray();
        
       # get user permissions id
        $userPermission = $user->roles
                        ->flatmap(function($role) use ($permissionsId) {
                            $role->permissions()->attach($permissionsId);
                            return [Role::find($role->id)->permissions->pluck('id')->toArray()];
                        })->flatmap(function($role){
                            return !empty($role) ? $role :'';
                        })->toArray();

        # check if user has permissions to access
        $this->assertTrue(count(array_intersect($permissionsId, $userPermission)) > 0);

        $response = $this->actingAs($user)
            ->post('/dashboard/updates', [
                'title' => 'new update',
                'clickable' => 1,
                'overview' => 'announcement',
                'category' => 'announcement',
                'paragraph' => 'wewskie',
            ]);

        $this->assertCount(1, Update::all());
        $response->assertRedirect('/dashboard/updates');
    }
}
