<?php

namespace Tests\Feature\dashboard;

use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Entities\User;
use App\Models\Entities\Images;

class ImageTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function checkActiveImagePageWithAuthenticatedUser()
    {
        $user = factory(\App\Models\Entities\User::class)->create();

        $this->actingAs($user)
            ->get('dashboard/images-active')
            ->assertOk()
            ->assertSee('Active Image/s');
    }

    /** @test */
    public function checkInactiveImagePageWithAuthenticatedUser()
    {
        $user = factory(\App\Models\Entities\User::class)->create();

        $this->actingAs($user)
            ->get('dashboard/images-inactive')
            ->assertOk()
            ->assertSee('Inactive Image/s');
    }

    /** @test */
    public function userCanUploadAnImage()
    {
        $user = factory(\App\Models\Entities\User::class)->create();
        
        \Storage::fake('local');

       $response = $this->actingAs($user)
            ->post('dashboard/images-inactive/image-upload', ['image_name' => 
                    [
                        UploadedFile::fake()->image('file.png', 600, 600),
                        UploadedFile::fake()->image('file2.png', 600, 600)
                    ]
                ]);

        $response->assertRedirect('dashboard/images-inactive');   
       
        $this->assertCount(2, Images::all());   
        \Storage::disk('local')->assertExists("public/img/slider/inactive/file.png");

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file2.png");
    }

    /** @test */
    public function userCanActivateAnImage()
    {
        $this->withoutExceptionHandling();
       $user = factory(\App\Models\Entities\User::class)->create();
        
        \Storage::fake('local');

        $response = $this->actingAs($user)
            ->post('dashboard/images-inactive/image-upload', ['image_name' => 
                    [
                        UploadedFile::fake()->image('file.png', 600, 600),
                        UploadedFile::fake()->image('file2.png', 600, 600)
                    ]
                ]);

        $this->assertCount(2, Images::all());   

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file.png");

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file2.png");

        $response->assertRedirect('dashboard/images-inactive');

        $this->actingAs($user)
            ->post('dashboard/images-inactive/image-remove-or-activate', ['images' => ['file.png', 'file2.png'], 'imgs_type' => 'activate' ]);

            $this->assertEquals('1', Images::find(1)->is_active);
            $this->assertEquals('1', Images::find(2)->is_active);

            \Storage::disk('local')->assertExists("public/img/slider/active/file.png");
            \Storage::disk('local')->assertExists("public/img/slider/active/file2.png");
    }

    /** @test */
    public function userCanRemoveAnImage()
    {
       $user = factory(\App\Models\Entities\User::class)->create();
        
        \Storage::fake('local');

        $response = $this->actingAs($user)
            ->post('dashboard/images-inactive/image-upload', ['image_name' => 
                    [
                        UploadedFile::fake()->image('file.png', 600, 600),
                        UploadedFile::fake()->image('file2.png', 600, 600)
                    ]
                ]);
            
        $this->assertCount(2, Images::all());   

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file.png");

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file2.png");

        $response->assertRedirect('dashboard/images-inactive');

        $this->actingAs($user)
            ->post('dashboard/images-inactive/image-remove-or-activate', ['images' => ['file.png', 'file2.png'], 'imgs_type' => 'remove' ]);

            $this->assertCount(0, Images::all());

            \Storage::disk('local')->assertMissing("public/img/slider/active/file.png");
            \Storage::disk('local')->assertMissing("public/img/slider/active/file2.png");
    }

    /** @test */
    public function userCanArrangeImages()
    {
       $user = factory(\App\Models\Entities\User::class)->create();
        
        \Storage::fake('local');

        $response = $this->actingAs($user)
            ->post('dashboard/images-inactive/image-upload', ['image_name' => 
                    [
                        UploadedFile::fake()->image('file.png', 600, 600),
                        UploadedFile::fake()->image('file2.png', 600, 600)
                    ]
                ]);

        $this->assertCount(2, Images::all());   

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file.png");

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file2.png");

        $response->assertRedirect('dashboard/images-inactive');

        $this->actingAs($user)
            ->post('dashboard/images-inactive/image-remove-or-activate', ['images' => ['file.png', 'file2.png'], 'imgs_type' => 'activate' ]);


            $this->assertEquals('1', Images::find(1)->is_active);
            $this->assertEquals('1', Images::find(2)->is_active);

            \Storage::disk('local')->assertExists("public/img/slider/active/file.png");
            \Storage::disk('local')->assertExists("public/img/slider/active/file2.png");

       $response2 = $this->actingAs($user)
            ->post('dashboard/images-active/image-arrange-or-deactivate', 
                ['images' => ['file2.png', 'file.png'],
                 'imgs_type' => 'arrange']);

            $this->assertEquals('2', Images::find(1)->number);
            $this->assertEquals('1', Images::find(2)->number);       
    }

    /** @test */
    public function userCanDeactivateImages()
    {
               $user = factory(\App\Models\Entities\User::class)->create();
        
        \Storage::fake('local');

        $response = $this->actingAs($user)
            ->post('dashboard/images-inactive/image-upload', ['image_name' => 
                    [
                        UploadedFile::fake()->image('file.png', 600, 600),
                        UploadedFile::fake()->image('file2.png', 600, 600)
                    ]
                ]);

        $this->assertCount(2, Images::all());   

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file.png");

        \Storage::disk('local')->assertExists("public/img/slider/inactive/file2.png");

        $response->assertRedirect('dashboard/images-inactive');

        $this->actingAs($user)
            ->post('dashboard/images-inactive/image-remove-or-activate', ['images' => ['file.png', 'file2.png'], 'imgs_type' => 'activate' ]);


            $this->assertEquals('1', Images::find(1)->is_active);
            $this->assertEquals('1', Images::find(2)->is_active);

            \Storage::disk('local')->assertExists("public/img/slider/active/file.png");
            \Storage::disk('local')->assertExists("public/img/slider/active/file2.png");

       $response2 = $this->actingAs($user)
            ->post('dashboard/images-active/image-arrange-or-deactivate', 
                ['images' => ['file2.png', 'file.png'],
                 'imgs_type' => 'deactivate']);

            $this->assertEquals('0', Images::find(1)->is_active);
            $this->assertEquals('0', Images::find(2)->is_active);

            $this->assertNull(Images::find(1)->number);
            $this->assertNull(Images::find(2)->number);
    }
}

