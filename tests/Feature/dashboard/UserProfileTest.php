<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\Entities\User;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_check_user_profile_page_with_authenticated_user() 
    {     
        factory(User::class, 1)
            ->create()
            ->each(function ($usery) {
                 $usery->Personal_info()
                 ->save(factory(\App\Models\Entities\Personal_info::class)->make());

                 $usery->Department()
                 ->save(factory(\App\Models\Entities\Department::class)->make());

                  $this->actingAs($usery)
                    ->get('/dashboard/profile/'.$usery->id)
                    ->assertSee('Account Profile');  
               });

        $this->assertNotNull(Auth::id());
    }

    public function test_check_user_profile_update_page_with_authenticated_user() 
    {
         factory(User::class, 1)
            ->create()
            ->each(function ($usery) {
                 $usery->Personal_info()
                 ->save(factory(\App\Models\Entities\Personal_info::class)->make());

                 $usery->Department()
                 ->save(factory(\App\Models\Entities\Department::class)->make());

                  $this->actingAs($usery)
                    ->get('/dashboard/profile/'.$usery->id.'/edit');
               });

        $this->assertNotNull(Auth::id());
    }

    public function test_update_person_info_with_authenticated_user() 
    {
        $this->withoutExceptionHandling();
        factory(User::class, 1)
            ->create()
            ->each(function ($usery) {
                 $usery->Personal_info()
                 ->save(factory(\App\Models\Entities\Personal_info::class)->make());

                 $usery->Department()
                 ->save(factory(\App\Models\Entities\Department::class)->make());

                   $response = $this->actingAs($usery)
                    ->patch('/dashboard/profile/'.$usery->id, 
                        [
                            'firstname' => 'jjjj',
                            'lastname' => 'qqqq',
                            'gender' => 'female',
                            'username' => 'admin2',
                            'old_password' => 'dwcl1961',
                            'new_password' => 'dwcl1962',
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
                            'username' => 'admin2',
                        ]);


                    $this->assertDatabaseHas('departments',
                        [
                            'department_name' => 'aaaa',
                            'user_id'=> $usery->id ,
                        ]);

                    $response->assertRedirect('dashboard/profile/'.$usery->id);
               });
    }
}
