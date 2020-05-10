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
        $user = factory(\App\Models\Entities\User::class)->create();

        $this->actingAs($user)
                ->get('dashboard/roles')
                ->assertSee('Roles');
    } 

    public function test_user_can_visit_create_role_page()
    {
        $user = factory(\App\Models\Entities\User::class)->create();

        $this->actingAs($user)
                ->get('dashboard/roles/create')
                ->assertSee('Add Role');
    }

    public function test_user_can_store_a_new_role()
    {
        $user = factory(\App\Models\Entities\User::class)->create();
        $this->seed('PermissionSeeder');

        $response = $this->actingAs($user)
                ->post('dashboard/roles', ['title' => 'newPost', 'permissions' => [2, 3]]);

        $this->assertCount(1, Role::all());
        $role = Role::first();
        $this->assertEquals([2, 3], $role->permissions->pluck('id')->toArray());

        $response->assertRedirect('dashboard/roles');
    }

    public function test_user_can_visit_edit_role_page()
    {
        $this->seed('RoleSeeder');
        $user = factory(\App\Models\Entities\User::class)->create();

        $response = $this->actingAs($user)
                ->get('dashboard/roles/'.Role::first()->id.'/edit')
                ->assertSee('Update role');
    }

    public function test_user_can_update_role()
    {
        $user = factory(\App\Models\Entities\User::class)->create();
        $this->seed('PermissionSeeder');

        $response = $this->actingAs($user)
                ->post('dashboard/roles', ['title' => 'newPost', 'permissions' => [1, 3]]);

        $this->assertCount(1, Role::all());
        $role = Role::first();

        $this->assertEquals([1, 3], $role->permissions->pluck('id')->toArray());

         $response = $this->actingAs($user)
                ->patch('dashboard/roles/'.Role::first()->id, 
                    [
                        'title' => 'newRoleTitle',
                        'permissions' => [2],
                    ]
                );

        $role->refresh();
        $this->assertEquals([2], $role->permissions->pluck('id')->toArray());
        $this->assertEquals('newRoleTitle', Role::first()->title);

        $response->assertRedirect('dashboard/roles');
    }

    public function test_user_can_delete_role()
    {
        $user = factory(\App\Models\Entities\User::class)->create();
        $this->seed('RoleSeeder');

         $response = $this->actingAs($user)
                ->delete('dashboard/roles/'.Role::first()->id);

        $this->assertCount(2, Role::all());
    }     
}
