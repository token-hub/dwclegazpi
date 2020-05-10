<?php

namespace Tests\Feature\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Entities\Permission;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_visit_permissions_page()
    {
        $user = factory(\App\Models\Entities\User::class)->create();

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
        $user = factory(\App\Models\Entities\User::class)->create();

        $this->actingAs($user)
            ->get('dashboard/permissions/create')
            ->assertSee('Add Permission');
    }

    public function test_user_can_store_new_permission()
    {
        $user = factory(\App\Models\Entities\User::class)->create();

        $response = $this->actingAs($user)
            ->post('dashboard/permissions/', ['title' => 'newPermission']);

        $this->assertCount(1, Permission::all());

        $response->assertRedirect('dashboard/permissions');
    }

    public function test_user_can_visit_edit_permission_page()
    {   
        $this->seed('PermissionSeeder');
        $user = factory(\App\Models\Entities\User::class)->create();

        $response = $this->actingAs($user)
            ->get('dashboard/permissions/'.Permission::first()->id.'/edit')
            ->assertSee('Update Permission');
    }

    public function test_user_can_update_new_permission()
    {
        $user = factory(\App\Models\Entities\User::class)->create();

        $this->actingAs($user)
            ->post('dashboard/permissions/', ['title' => 'newPermission']);

        $this->assertCount(1, Permission::all());

        $response = $this->actingAs($user)
            ->patch('dashboard/permissions/'.Permission::first()->id, ['title' => 'Permission Edited']);

        $this->assertEquals('Permission Edited', Permission::first()->title);

        $response->assertRedirect('dashboard/permissions');
    }

    public function test_user_can_delete_permission()
    {
        $this->withoutExceptionHandling();

        $user = factory(\App\Models\Entities\User::class)->create();
       
        $this->actingAs($user)
            ->post('dashboard/permissions/', ['title' => 'newPermission']);

        $this->assertCount(1, Permission::all());

        $response = $this->actingAs($user)
            ->delete('dashboard/permissions/'.Permission::first()->id);

        $this->assertCount(0, Permission::all());
    }       
}
