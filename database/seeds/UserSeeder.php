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
        User::create(
        	[
        		'username' => 'samplesample',
        		'email' => 'sample@g.c',
        		'password' => \Hash::make('samplesample'),
        		'email_verified_at' => now()
        	]
        );
    }
}
