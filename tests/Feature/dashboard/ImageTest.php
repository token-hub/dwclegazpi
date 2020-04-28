<?php

namespace Tests\Feature\dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Entities\User;

class ImageTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function checkActiveImagePageWithAuthenticatedUser()
    {
        $this->withoutExceptionHandling();

        $user = factory(\App\Models\Entities\User::class)->create();

        $this->actingAs($user)
            ->get('dashboard/images-active')
            ->assertOk()
            ->assertSee('Active Image/s');
    }

    /** @test */
    public function checkInactiveImagePageWithAuthenticatedUser()
    {
        $this->withoutExceptionHandling();

        $user = factory(\App\Models\Entities\User::class)->create();

        $this->actingAs($user)
            ->get('dashboard/images-inactive')
            ->assertOk()
            ->assertSee('Inactive Image/s');
    }
}
