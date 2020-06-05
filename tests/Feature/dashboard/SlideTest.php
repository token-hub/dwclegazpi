<?php

namespace Tests\Feature\dashboard;

use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Entities\User;
use App\Models\Entities\slide;
use App\Models\Entities\Image;
use App\Models\Entities\Permission;
use App\Models\Entities\Role;

class slideTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_check_active_slide_page_with_authenticated_user()
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::whereIn('title', ['update active slide', 'delete active slide'])->pluck('id')->toArray();
        
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
            ->get('dashboard/slides-active')
            ->assertSee('Active Slide/s');
    }

    public function test_check_inactive_slide_page_with_authenticated_user()
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

        # get permission id
        $permissionsId = Permission::whereIn('title', ['add inactive slide', 'update inactive slide', 'delete inactive slide'])->pluck('id')->toArray();

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
            ->get('dashboard/slides-inactive')
            ->assertSee('Inactive Slide/s');
    }

    public function test_user_can_upload_an_slide()
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

         # get permission id
        $permissionsId = Permission::where('title', 'add inactive slide')->pluck('id')->toArray();
        
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
        
        \Storage::fake('local');

        $filePath = storage_path('app/public/img/slider/deleted/CIVIL.JPG'); # hmmm :'* this works?'

        $response = $this->actingAs($user)
            ->postJson('dashboard/slides-inactive/image-upload', ['image_name' => 
                    [
                       new UploadedFile($filePath,'file.png', null, null, null, true),
                       new UploadedFile($filePath,'file2.png', null, null, null, true)
                    ]
                ]);

        $response->assertRedirect('dashboard/slides-inactive');   
       
        $this->assertCount(2, slide::all());
        $this->assertCount(2, Image::all());   
        \Storage::disk('local')->assertExists("public/img/slider/inactive/file.png");
        \Storage::disk('local')->assertExists("public/img/slider/inactive/file2.png");
    }

    public function test_user_can_activate_an_slide()
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

         # get permission id
        $permissionsId = Permission::whereIn('title', ['update inactive slide', 'add inactive slide'])->pluck('id')->toArray();
        
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
        
        \Storage::fake('local');

        $filePath = storage_path('app/public/img/slider/deleted/CIVIL.JPG'); # hmmm :'* this works?'

        $response = $this->actingAs($user)
            ->postJson('dashboard/slides-inactive/image-upload', ['image_name' => 
                    [
                       new UploadedFile($filePath,'file.png', null, null, null, true),
                       new UploadedFile($filePath,'file2.png', null, null, null, true)
                    ]
                ]);

        $this->assertCount(2, Slide::all());
        $this->assertCount(2, Image::all());   
        

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file.png");

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file2.png");

        $response->assertRedirect('dashboard/slides-inactive');

        $this->actingAs($user)
            ->patch('dashboard/slides-inactive/activate', ['slides' => ['file.png', 'file2.png'], 'imgs_type' => 'activate' ]);

            $this->assertEquals('1', slide::find(1)->is_active);
            $this->assertEquals('1', slide::find(2)->is_active);

            \Storage::disk('local')->assertExists("public/img/slider/active/file.png");
            \Storage::disk('local')->assertExists("public/img/slider/active/file2.png");
    }

    public function test_user_can_remove_an_slide()
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

         # get permission id
        $permissionsId = Permission::whereIn('title', ['delete inactive slide', 'add inactive slide'])->pluck('id')->toArray();
        
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
        
        \Storage::fake('local');

        $filePath = storage_path('app/public/img/slider/deleted/CIVIL.JPG'); # sample file

        $response = $this->actingAs($user)
            ->postJson('dashboard/slides-inactive/image-upload', ['image_name' => 
                    [
                       new UploadedFile($filePath,'file.png', null, null, null, true),
                       new UploadedFile($filePath,'file2.png', null, null, null, true)
                    ]
                ]);
            
        $this->assertCount(2, slide::all());
        $this->assertCount(2, Image::all());   

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file.png");

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file2.png");

        $response->assertRedirect('dashboard/slides-inactive');

        $this->actingAs($user)
            ->delete('dashboard/slides-inactive/remove', ['slides' => ['file.png', 'file2.png'], 'imgs_type' => 'remove' ]);

            $this->assertCount(0, slide::all());

            \Storage::disk('local')->assertMissing("public/img/slider/active/file.png");
            \Storage::disk('local')->assertMissing("public/img/slider/active/file2.png");
    }

    public function test_user_can_arrange_slides()
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

         # get permission id
        $permissionsId = Permission::whereIn('title', ['update active slide', 'add inactive slide', 'update inactive slide'])->pluck('id')->toArray();
        
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
        
        \Storage::fake('local');

        $filePath = storage_path('app/public/img/slider/deleted/CIVIL.JPG'); # hmmm :'* this works?'

        $response = $this->actingAs($user)
            ->postJson('dashboard/slides-inactive/image-upload', ['image_name' => 
                    [
                       new UploadedFile($filePath,'file.png', null, null, null, true),
                       new UploadedFile($filePath,'file2.png', null, null, null, true)
                    ]
                ]);

        $this->assertCount(2, slide::all());
        $this->assertCount(2, Image::all());   

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file.png");

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file2.png");

        $response->assertRedirect('dashboard/slides-inactive');

        $this->actingAs($user)
            ->patch('dashboard/slides-inactive/activate', ['slides' => ['file.png', 'file2.png'], 'imgs_type' => 'activate' ]);

            $this->assertEquals('1', slide::find(1)->is_active);
            $this->assertEquals('1', slide::find(2)->is_active);

            \Storage::disk('local')->assertExists("public/img/slider/active/file.png");
            \Storage::disk('local')->assertExists("public/img/slider/active/file2.png");

       $response2 = $this->actingAs($user)
            ->patch('dashboard/slides-active/arrange', 
                ['slides' => ['file2.png'],
                 'imgs_type' => 'arrange']);

            $this->assertEquals('2', slide::find(1)->number);
            $this->assertEquals('1', slide::find(2)->number);       
    }

    public function test_user_can_deactivate_slides()
    {
        $this->seed('RoleSeeder');
        $this->seed('PermissionSeeder');

        $user = factory(\App\Models\Entities\User::class)->create();

        $user->roles()->attach([1, 2, 3]);

         # get permission id
        $permissionsId = Permission::whereIn('title', ['delete active slide', 'add inactive slide', 'update inactive slide'])->pluck('id')->toArray();
        
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
        
        \Storage::fake('local');

        $filePath = storage_path('app/public/img/slider/deleted/CIVIL.JPG'); # hmmm :'* this works?'

        $response = $this->actingAs($user)
            ->postJson('dashboard/slides-inactive/image-upload', ['image_name' => 
                    [
                       new UploadedFile($filePath,'file.png', null, null, null, true),
                       new UploadedFile($filePath,'file2.png', null, null, null, true)
                    ]
                ]);

        $this->assertCount(2, slide::all());
        $this->assertCount(2, Image::all());   

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file.png");

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file2.png");

        $response->assertRedirect('dashboard/slides-inactive');

        $this->actingAs($user)
            ->patch('dashboard/slides-inactive/activate', ['slides' => ['file.png', 'file2.png'], 'imgs_type' => 'activate' ]);

            $this->assertEquals('1', slide::find(1)->is_active);
            $this->assertEquals('1', slide::find(2)->is_active);

            \Storage::disk('local')->assertExists("public/img/slider/active/file.png");
            \Storage::disk('local')->assertExists("public/img/slider/active/file2.png");

       $response2 = $this->actingAs($user)
            ->patch('dashboard/slides-active/deactivate', 
                ['slides' => ['file2.png', 'file.png'],
                 'imgs_type' => 'deactivate']);

            $this->assertEquals('0', slide::find(1)->is_active);
            $this->assertEquals('0', slide::find(2)->is_active);

            $this->assertNull(slide::find(1)->number);
            $this->assertNull(slide::find(2)->number);
    }
}
