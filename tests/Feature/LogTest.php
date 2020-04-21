<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LogTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function check_logs_page_with_authenticated_user() {
        $user = factory(\App\Models\User::class)->create();

        $this->actingAs($user)
            ->get('/dashboard/logs')
            ->assertSee('Logs');

        $this->assertNotNull(Auth::id());
    }

    /** @test */
    public function view_user_log_with_authenticated_user() {
        $this->withoutExceptionHandling();

        $user = factory(\App\Models\User::class)->create();

        $this->actingAs($user)
            ->get('/dashboard/logs-view/1')
            ->assertSee('Logs view');

        $this->assertNotNull(Auth::id());
    }
}
