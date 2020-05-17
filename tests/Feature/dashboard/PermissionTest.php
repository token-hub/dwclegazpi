<?php

namespace Tests\Feature\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Entities\Permission;
use App\Models\Entities\Role;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_visit_permissions_page()
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::whereIn('title', ['Add Permission', 'Update Permission', 'Delete Permission'])->pluck('id')->toArray();
        
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
            ->get('dashboard/permissions')
            ->assertSee('Permissions');
    }

    public function test_permission_data_must_be_visible_on_permissions_page()
    {
        $user = factory(\App\Models\Entities\User::class)->create();

         $this->actingAs($user)
            ->get('dashboard/permission-data')
            ->assertOk();
    }

    public function test_user_can_visit_create_permissions_page()
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::where('title', 'Add Permission')->pluck('id')->toArray();
        
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
            ->get('dashboard/permissions/create')
            ->assertSee('Add Permission');
    }

    public function test_user_can_store_new_permission()
    {
        $this->seed('RoleSeeder');
       $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::where('title', 'Add Permission')->pluck('id')->toArray();
        
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

        $initial = count(Permission::all());

        $response = $this->actingAs($user)
            ->post('dashboard/permissions/', ['title' => 'newPermission']);

        $this->assertCount($initial+1 , Permission::all());

        $response->assertRedirect('dashboard/permissions');
    }

    public function test_user_can_visit_edit_permission_page()
    {   
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::where('title', 'Update Permission')->pluck('id')->toArray();
        
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
            ->get('dashboard/permissions/'.Permission::first()->id.'/edit')
            ->assertSee('Update Permission');
    }

    public function test_user_can_update_permission()
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::where('title', 'Update Permission')->pluck('id')->toArray();
        
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

        $permission = Permission::first();
        $response = $this->actingAs($user)
            ->patch('dashboard/permissions/'.$permission->id, ['title' => 'Permission Edited']);
        
        $permission->refresh();
        $this->assertEquals('Permission Edited', $permission->title);

        $response->assertRedirect('dashboard/permissions');
    }

    public function test_user_can_delete_permission()
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::where('title', 'Delete Permission')->pluck('id')->toArray();
        
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

        $initial = count(Permission::all());

        $response = $this->actingAs($user)
            ->delete('dashboard/permissions/'.Permission::first()->id);

        $this->assertCount($initial - 1, Permission::all());
    }       
}
