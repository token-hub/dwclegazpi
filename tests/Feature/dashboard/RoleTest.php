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

        $rolePermissionsId = Permission::whereIn('title', ['Add Role', 'Update Role', 'Delete Role'])->pluck('id')->toArray();
        
        $hasRolePermission = $user->roles
                            ->flatmap(function($role) use ($rolePermissionsId) {
                                $role->permissions()->attach($rolePermissionsId);

                                foreach($rolePermissionsId as $rpi){
                                    return [Role::find($role->id)->first()->permissions->contains($rpi)];
                                }
                            })->toArray();

        $this->assertTrue(in_array(true, $hasRolePermission));

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

        $rolePermissionId = Permission::where('title', 'Add Role')->first()->id;
        
        $hasRolePermission = $user->roles
                            ->flatmap(function($role) use ($rolePermissionId) {
                                $role->permissions()->attach($rolePermissionId);
                                return [Role::find($role->id)->first()->permissions->contains($rolePermissionId)];
                            })->toArray();

        $this->assertTrue(in_array(true, $hasRolePermission));

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

        $rolePermissionId = Permission::where('title', 'Add Role')->first()->id;
        
        $hasRolePermission = $user->roles
                            ->flatmap(function($role) use ($rolePermissionId) {
                                $role->permissions()->attach([1]);
                                return [Role::find($role->id)->first()->permissions->contains($rolePermissionId)];
                            })->toArray();

        $this->assertTrue(in_array(true, $hasRolePermission));

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

        $rolePermissionId = Permission::where('title', 'Add Role')->first()->id;
        
        $hasRolePermission = $user->roles
                            ->flatmap(function($role) use ($rolePermissionId) {
                                $role->permissions()->attach([1]);
                                return [Role::find($role->id)->first()->permissions->contains($rolePermissionId)];
                            })->toArray();

        $this->assertTrue(in_array(true, $hasRolePermission));             

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

        $rolePermissionId = Permission::where('title', 'Add Role')->first()->id;
        
        $hasRolePermission = $user->roles
                            ->flatmap(function($role) use ($rolePermissionId) {
                                $role->permissions()->attach([1]);
                                return [Role::find($role->id)->first()->permissions->contains($rolePermissionId)];
                            })->toArray();

        $this->assertTrue(in_array(true, $hasRolePermission));            

         $response = $this->actingAs($user)
                ->patch('dashboard/roles/'.Role::first()->id, 
                    [
                        'title' => 'newRoleTitle',
                        'permissions' => [2],
                    ]
                );

        $this->assertEquals([2], Role::first()->permissions->pluck('id')->toArray());
        $this->assertEquals('newRoleTitle', Role::first()->title);

        $response->assertRedirect('dashboard/roles');
    }

    public function test_user_can_delete_role()
    {   
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        $rolePermissionId = Permission::where('title', 'Add Role')->first()->id;
        
        $hasRolePermission = $user->roles
                            ->flatmap(function($role) use ($rolePermissionId) {
                                $role->permissions()->attach([1]);
                                return [Role::find($role->id)->first()->permissions->contains($rolePermissionId)];
                            })->toArray();

        $this->assertTrue(in_array(true, $hasRolePermission));   

        $response = $this->actingAs($user)
                ->delete('dashboard/roles/'.Role::first()->id);

        $this->assertCount(2, Role::all());
    }     
}
