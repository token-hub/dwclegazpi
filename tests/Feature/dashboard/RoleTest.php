<?php

namespace Tests\Feature\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Entities\Role;
use App\Models\Entities\Permission;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_visit_roles_page()
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::whereIn('title', ['add role', 'update role', 'delete role'])->pluck('id')->toArray();
        
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
                ->get('dashboard/roles')
                ->assertSee('Roles');
    } 

    public function test_user_can_visit_create_role_page()
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

         # get permission id
        $permissionsId = Permission::where('title', 'add role')->pluck('id')->toArray();
        
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
                ->get('dashboard/roles/create')
                ->assertSee('Add Role');
    }

    public function test_user_can_store_a_new_role()
    {   
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

         # get permission id
        $permissionsId = Permission::where('title', 'add role')->pluck('id')->toArray();
        
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
                ->post('dashboard/roles', ['title' => 'newPost', 'permissions' => [2, 3]]);

        $this->assertCount(4, Role::all());
        $role = Role::find(4);
        $this->assertEquals([2, 3], $role->permissions->pluck('id')->toArray());

        $response->assertRedirect('dashboard/roles');
    }

    public function test_user_can_visit_edit_role_page()
    {   
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::where('title', 'update role')->pluck('id')->toArray();
        
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
                ->get('dashboard/roles/'.Role::first()->id.'/edit')
                ->assertSee('Update role');
    }

    public function test_user_can_update_role()
    {   
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        $rolePermissionId = Permission::where('title', 'update role')->first()->id;
        
        $hasPermission = $user->roles
                            ->flatmap(function($role) use ($rolePermissionId) {
                                $role->permissions()->attach([2]);
                                return [Role::find($role->id)->first()->permissions->contains($rolePermissionId)];
                            })->toArray();

        $this->assertTrue(in_array(true, $hasPermission));            

         $response = $this->actingAs($user)
                ->patch('dashboard/roles/'.Role::first()->id, 
                    [
                        'title' => 'newRoleTitle',
                        'permissions' => [2],
                    ]
                );

        $this->assertEquals([2], Role::first()->permissions->pluck('id')->toArray());
        $this->assertEquals('NewRoleTitle', Role::first()->title);

        $response->assertRedirect('dashboard/roles');
    }

    public function test_user_can_delete_role()
    {   
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::where('title', 'delete role')->pluck('id')->toArray();
        
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
                ->delete('dashboard/roles/'.Role::first()->id);

        $this->assertCount(2, Role::all());
    }     
}
