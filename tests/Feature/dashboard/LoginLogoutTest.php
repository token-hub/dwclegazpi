<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\Entities\User;

class LoginLogoutTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function show_login_page() 
    {
        $this->get('dashboard')
             ->assertOk();
    }

    /** @test */
    public function login_user_with_correct_credentials()
    {
        $user = User::create(array_merge($this->data(), ['is_active' => '1']));

        $response = $this->post('dashboard', array_merge($this->data(), ['is_active' => '1', 'password' => 'johnjohn']));

        $this->assertEquals('Active', $user->is_active);
        $this->assertNotNull($user->email_verified_at);

        $response->assertRedirect('/dashboard/home');
        $this->assertNotNull(Auth::id());
    }

    /** @test */
    public function login_user_with_incorrect_credentials() 
    {
        User::create($this->data());

        $response = $this->post('dashboard', array_merge($this->data(), ['password' => '12345677']));

        $response->assertRedirect('dashboard');
        
        $this->assertNull(Auth::id());
    }

     /** @test */
     public function username_is_required() 
     {
         $response = $this->post('dashboard', array_merge($this->data(), ['username' => '']))
            ->assertSessionHasErrors('username');
     }

     /** @test */
     public function logout() 
     {
        $this->withoutExceptionHandling();
        
        $user = User::create(array_merge($this->data(), ['is_active' => '1', 'remember' => true]));

        $this->actingAs($user);
        $this->assertNotNull(Auth::id());
        
        $response = $this->post('dashboard/logout');

        $this->assertNull(Auth::id());
     }

     /** @test */
     public function test_remember_me_functionality()
     {

       $user = User::create(array_merge($this->data(), ['is_active' => '1', 'remember' => true]));
        
        $response = $this->post('dashboard', array_merge($this->data(), ['is_active' => '1', 'remember' => true, 'password' => 'johnjohn']));
        
        $this->assertEquals('Active', $user->is_active);

        $response->assertRedirect('/dashboard/home');
        $this->assertNotNull(Auth::id());

        $response->assertCookie(Auth::getRecallerName(), vsprintf('%s|%s|%s', [
            User::first()->id,
            User::first()->remember_token,
            User::first()->password,
        ]));
    }

    public function data() {
        return [
            'username' => 'john',
            'password' => \Hash::make('johnjohn'),
            'email_verified_at' => now(),
        ];
    }
}
