<?php

namespace Tests\Feature\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Entities\User;

class userTest extends TestCase
{   
    use RefreshDatabase;

    public function test_user_can_visit_users_page()
    {
        $user = factory(\App\Models\Entities\User::class)->create();

        $this->actingAs($user)
                ->get('/dashboard/users')
                ->assertSee('Users');
    }

    public function test_users_data_must_be_visible_on_users_page()
    {
        $user = factory(\App\Models\Entities\User::class)->create();
        
         $this->actingAs($user)
            ->get('dashboard/user-data')
            ->assertOk();
    }

    public function test_user_can_be_update()
    {
        $user = factory(\App\Models\Entities\User::class)->create();
        $this->seed('RoleSeeder');

        $user->roles()->attach([1]);

        $this->actingAs($user)
                ->get('/dashboard/users/'.$user->id.'/edit')
                ->assertSee('Update Account');

        $this->actingAs($user)
                ->patch('/dashboard/users/'.$user->id, ['roles' => [3,2], 'status' => 0]);

        $user->refresh();
        $this->assertEquals('Inactive', $user->is_active);
        $this->assertEquals([3, 2], $user->roles->pluck('id')->toArray());       
    }

    public function test_user_can_be_deleted()
    {
        $user = factory(\App\Models\Entities\User::class)->create();
        $user2 = factory(\App\Models\Entities\User::class)->create();

        $response = $this->actingAs($user)
                ->delete('/dashboard/users/'.$user2->id);

        $this->assertCount(1, User::all());
    }
}
