<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\Roles;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = [
    		['title' => 'admin'],
    		['title' => 'author'],
    		['title' => 'user'],
    	];

    	foreach($roles as $role)
    	{
    		Roles::create($role);
    	}
    }
}
