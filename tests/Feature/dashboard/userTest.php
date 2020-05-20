<?php

namespace Tests\Feature\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Entities\User;
use App\Models\Entities\Role;
use App\Models\Entities\Permission;

class userTest extends TestCase
{   
    use RefreshDatabase;

    public function test_user_can_visit_users_page()
    {   
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::whereIn('title', ['add user', 'update user', 'delete user'])->pluck('id')->toArray();
        
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
                ->get('/dashboard/users')
                ->assertSee('Users');
    }

    public function test_users_data_must_be_visible_on_users_page()
    {
        $user = factory(\App\Models\Entities\User::class)->create();
           
        $this->actingAs($user)
            ->get('dashboard/user-data')
            ->assertOk();
    }

    public function test_user_can_be_update()
    {
        $this->withoutExceptionHandling();
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::where('title', 'update user')->pluck('id')->toArray();
        
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
                ->get('/dashboard/users/'.$user->id.'/edit')
                ->assertSee('Update Account');

        $this->actingAs($user)
                ->patch('/dashboard/users/'.$user->id, ['roles' => [2], 'status' => 0]);

        $user->refresh();
        $this->assertEquals('Inactive', $user->is_active);
        $this->assertEquals([2], $user->roles->pluck('id')->toArray());       
    }

    public function test_user_can_be_deleted()
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::where('title', 'delete user')->pluck('id')->toArray();
        
       # get user permissions id
        $userPermission = $user->roles
                        ->flatmap(function($role) use ($permissionsId) {
                            $role->permissions()->attach($permissionsId);
                            return [Role::find($role->id)->permissions->pluck('id')->toArray()];
                        })->flatmap(function($role){
                            return !empty($role) ? $role :'';
                        })->toArray();

        $user2 = factory(\App\Models\Entities\User::class)->create();

        $response = $this->actingAs($user)
                ->delete('/dashboard/users/'.$user2->id);

        $this->assertCount(1, User::all());
    }
}
