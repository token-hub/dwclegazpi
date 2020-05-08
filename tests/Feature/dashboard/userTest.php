<?php

namespace Tests\Feature\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class userTest extends TestCase
{   
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_visit_users_page()
    {
        $this->withoutExceptionHandling();
        $user = factory(\App\Models\Entities\User::class)->create();

        $this->actingAs($user)
                ->get('/dashboard/users')
                ->assertSee('Users');
    } 
}
