<?php

namespace Tests\Feature\dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Entities\User;
use App\Models\Entities\Personal_info;
use App\Models\Entities\Department;
use Illuminate\Support\Facades\Auth;

class RegistrationTest extends TestCase
{
  use RefreshDatabase;

  public function test_check_registration_page_with_authenticated_user() 
  {
    $user = User::create($this->data());

    $this->actingAs($user)
        ->get('dashboard/register')
        ->assertSee('Registration');

    $this->assertNotNull(Auth::id());
  }

  public function test_check_registration_page_with_unauthenticated_user() 
  {
    $response = $this->get('dashboard/register');
    $response->assertRedirect('dashboard');

    $this->assertNull(Auth::id());
  }


  public function test_admin_can_register_a_user() 
  {
    $this->withoutExceptionHandling();

    $user = User::create($this->data());

    $response = $this->actingAs($user)
        ->post('dashboard/register', [
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

    $response->assertRedirect('dashboard/register');
  }

  public function data() {
    return [
       'username' => '123',
        'password' => '12345',
        'email_verified_at' => now(),
      ];
  }
}
