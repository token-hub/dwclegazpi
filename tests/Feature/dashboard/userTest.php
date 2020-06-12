<?php

namespace Tests\Feature\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Entities\User;
use App\Models\Entities\Role;
use App\Models\Entities\Permission;
use App\Models\Entities\Personal_info;
use App\Models\Entities\Department;
use Illuminate\Support\Facades\Auth;

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

    public function test_check_add_user_page_with_authenticated_user() 
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = User::create($this->data());

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::where('title', 'add user')->pluck('id')->toArray();
        
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
            ->get('dashboard/users/create')
            ->assertSee('Add User');

        $this->assertNotNull(Auth::id());
      }

     public function test_authenticated_user_can_add_new_user() 
    {
        $this->withoutExceptionhandling();
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = User::create($this->data());

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::where('title', 'add user')->pluck('id')->toArray();

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
            ->post('dashboard/users', [
                'firstname' => '123',
                'lastname' => 'l',
                'email' => 'johnsuyang2118@gmail.com',
                'gender' => 'male',
                'username' => 'username',
                'password' => 'passwor2',
                'department_name' => 'shom',
            ]);

        $this->assertCount(2, User::all());
        $this->assertCount(1, Personal_info::all());
        $this->assertCount(1, Department::all());

        $response->assertRedirect('dashboard/users');
    }

    public function test_user_can_be_update()
    {
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

    public function data() {
        return [
           'username' => '123',
            'password' => '12345',
            'email_verified_at' => now(),
          ];
  }
}
