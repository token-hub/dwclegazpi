<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\User;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function check_user_profile_page_with_authenticated_user() {
        
        factory(\App\Models\User::class, 1)
            ->create()
            ->each(function ($usery) {
                 $usery->Personal_info()
                 ->save(factory(\App\Models\Personal_info::class)->make());

                 $usery->Departments()
                 ->save(factory(\App\Models\Departments::class)->make());

                  $this->actingAs($usery)
                    ->get('/dashboard/profile-view/'.$usery->id)
                    ->assertSee('Account Profile');  
               });

        $this->assertNotNull(Auth::id());
    }

    /** @test */
    public function check_user_profile_update_page_with_authenticated_user() {

         factory(\App\Models\User::class, 1)
            ->create()
            ->each(function ($usery) {
                 $usery->Personal_info()
                 ->save(factory(\App\Models\Personal_info::class)->make());

                 $usery->Departments()
                 ->save(factory(\App\Models\Departments::class)->make());

                  $this->actingAs($usery)
                    ->get('/dashboard/profile-update/'.$usery->id);:
               });

        $this->assertNotNull(Auth::id());
    }

    /** @test */
    public function update_person_info_with_authenticated_user() {

        $this->withoutExceptionHandling();

        factory(\App\Models\User::class, 1)
            ->create()
            ->each(function ($usery) {
                 $usery->Personal_info()
                 ->save(factory(\App\Models\Personal_info::class)->make());

                 $usery->Departments()
                 ->save(factory(\App\Models\Departments::class)->make());

                   $response = $this->actingAs($usery)
                    ->patch('dashboard/profile-update/'.$usery->id, 
                        [
                            'firstname' => 'jjjj',
                            'lastname' => 'qqqq',
                            'gender' => 'female',
                            'username' => 'asdasdas',
                            'old_password' => 'johnjohn',
                            'new_password' => 'qwer1234',
                            'department_name' => 'aaaa',
                        ]);

                    $this->assertDatabaseHas('personal_infos',
                        [
                            'user_id'=> $usery->id ,
                            'firstname' => 'jjjj',
                            'lastname' => 'qqqq',
                            'gender' => 'female',
                        ]);

                    $this->assertDatabaseHas('users',
                        [
                            'username' => 'asdasdas',
                        ]);


                    $this->assertDatabaseHas('departments',
                        [
                            'department_name' => 'aaaa',
                            'user_id'=> $usery->id ,
                        ]);

                    $response->assertRedirect('dashboard/profile-view/'.$usery->id);
               });
    }
}