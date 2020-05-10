<?php

namespace Tests\Feature\dashboard;

use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Entities\User;
use App\Models\Entities\Image;

class ImageTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_check_active_image_page_with_authenticated_user()
    {
        $user = factory(\App\Models\Entities\User::class)->create();

        $this->actingAs($user)
            ->get('dashboard/images-active')
            ->assertOk()
            ->assertSee('Active Image/s');
    }

    public function test_check_inactive_image_page_with_authenticated_user()
    {
        $user = factory(\App\Models\Entities\User::class)->create();

        $this->actingAs($user)
            ->get('dashboard/images-inactive')
            ->assertOk()
            ->assertSee('Inactive Image/s');
    }

    public function test_user_can_upload_an_image()
    {
              $this->withoutExceptionHandling();
        $user = factory(\App\Models\Entities\User::class)->create();
        
        \Storage::fake('local');

        $filePath = storage_path('app/public/img/slider/deleted/CIVIL.JPG'); # hmmm :'* this works?'

        $response = $this->actingAs($user)
            ->postJson('dashboard/images-inactive/image-upload', ['image_name' => 
                    [
                       new UploadedFile($filePath,'file.png', null, null, null, true),
                       new UploadedFile($filePath,'file2.png', null, null, null, true)
                    ]
                ]);

        $response->assertRedirect('dashboard/images-inactive');   
       
        $this->assertCount(2, Image::all());   
        \Storage::disk('local')->assertExists("public/img/slider/inactive/file.png");
        \Storage::disk('local')->assertExists("public/img/slider/inactive/file2.png");
    }

    public function test_user_can_activate_an_image()
    {
      $user = factory(\App\Models\Entities\User::class)->create();
        
        \Storage::fake('local');

        $filePath = storage_path('app/public/img/slider/deleted/CIVIL.JPG'); # hmmm :'* this works?'

        $response = $this->actingAs($user)
            ->postJson('dashboard/images-inactive/image-upload', ['image_name' => 
                    [
                       new UploadedFile($filePath,'file.png', null, null, null, true),
                       new UploadedFile($filePath,'file2.png', null, null, null, true)
                    ]
                ]);

        $this->assertCount(2, Image::all());   

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file.png");

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file2.png");

        $response->assertRedirect('dashboard/images-inactive');

        $this->actingAs($user)
            ->post('dashboard/images-inactive/image-remove-or-activate', ['images' => ['file.png', 'file2.png'], 'imgs_type' => 'activate' ]);

            $this->assertEquals('1', Image::find(1)->is_active);
            $this->assertEquals('1', Image::find(2)->is_active);

            \Storage::disk('local')->assertExists("public/img/slider/active/file.png");
            \Storage::disk('local')->assertExists("public/img/slider/active/file2.png");
    }

    public function test_user_can_remove_an_image()
    {
       $user = factory(\App\Models\Entities\User::class)->create();
        
        \Storage::fake('local');

        $filePath = storage_path('app/public/img/slider/deleted/CIVIL.JPG'); # sample file

        $response = $this->actingAs($user)
            ->postJson('dashboard/images-inactive/image-upload', ['image_name' => 
                    [
                       new UploadedFile($filePath,'file.png', null, null, null, true),
                       new UploadedFile($filePath,'file2.png', null, null, null, true)
                    ]
                ]);
            
        $this->assertCount(2, Image::all());   

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file.png");

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file2.png");

        $response->assertRedirect('dashboard/images-inactive');

        $this->actingAs($user)
            ->post('dashboard/images-inactive/image-remove-or-activate', ['images' => ['file.png', 'file2.png'], 'imgs_type' => 'remove' ]);

            $this->assertCount(0, Image::all());

            \Storage::disk('local')->assertMissing("public/img/slider/active/file.png");
            \Storage::disk('local')->assertMissing("public/img/slider/active/file2.png");
    }

    public function test_user_can_arrange_images()
    {
      $user = factory(\App\Models\Entities\User::class)->create();
        
        \Storage::fake('local');

        $filePath = storage_path('app/public/img/slider/deleted/CIVIL.JPG'); # hmmm :'* this works?'

        $response = $this->actingAs($user)
            ->postJson('dashboard/images-inactive/image-upload', ['image_name' => 
                    [
                       new UploadedFile($filePath,'file.png', null, null, null, true),
                       new UploadedFile($filePath,'file2.png', null, null, null, true)
                    ]
                ]);

        $this->assertCount(2, Image::all());   

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file.png");

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file2.png");

        $response->assertRedirect('dashboard/images-inactive');

        $this->actingAs($user)
            ->post('dashboard/images-inactive/image-remove-or-activate', ['images' => ['file.png', 'file2.png'], 'imgs_type' => 'activate' ]);

            $this->assertEquals('1', Image::find(1)->is_active);
            $this->assertEquals('1', Image::find(2)->is_active);

            \Storage::disk('local')->assertExists("public/img/slider/active/file.png");
            \Storage::disk('local')->assertExists("public/img/slider/active/file2.png");

       $response2 = $this->actingAs($user)
            ->post('dashboard/images-active/image-arrange-or-deactivate', 
                ['images' => ['file2.png', 'file.png'],
                 'imgs_type' => 'arrange']);

            $this->assertEquals('2', Image::find(1)->number);
            $this->assertEquals('1', Image::find(2)->number);       
    }

    public function test_user_can_deactivate_images()
    {
               $user = factory(\App\Models\Entities\User::class)->create();
        
        \Storage::fake('local');

        $filePath = storage_path('app/public/img/slider/deleted/CIVIL.JPG'); # hmmm :'* this works?'

        $response = $this->actingAs($user)
            ->postJson('dashboard/images-inactive/image-upload', ['image_name' => 
                    [
                       new UploadedFile($filePath,'file.png', null, null, null, true),
                       new UploadedFile($filePath,'file2.png', null, null, null, true)
                    ]
                ]);

        $this->assertCount(2, Image::all());   

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file.png");

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file2.png");

        $response->assertRedirect('dashboard/images-inactive');

        $this->actingAs($user)
            ->post('dashboard/images-inactive/image-remove-or-activate', ['images' => ['file.png', 'file2.png'], 'imgs_type' => 'activate' ]);


            $this->assertEquals('1', Image::find(1)->is_active);
            $this->assertEquals('1', Image::find(2)->is_active);

            \Storage::disk('local')->assertExists("public/img/slider/active/file.png");
            \Storage::disk('local')->assertExists("public/img/slider/active/file2.png");

       $response2 = $this->actingAs($user)
            ->post('dashboard/images-active/image-arrange-or-deactivate', 
                ['images' => ['file2.png', 'file.png'],
                 'imgs_type' => 'deactivate']);

            $this->assertEquals('0', Image::find(1)->is_active);
            $this->assertEquals('0', Image::find(2)->is_active);

            $this->assertNull(Image::find(1)->number);
            $this->assertNull(Image::find(2)->number);
    }
}
