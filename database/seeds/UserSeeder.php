<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(
            	[
            		'username' => 'sample',
            		'email' => 'sample@g.c',
            		'password' => \Hash::make('samplesample'),
            		'email_verified_at' => now()
            	]
            );

        $user->department()->create(['department_name'=> 'soecs']);
        $user->roles()->attach([2]);
    }
}
