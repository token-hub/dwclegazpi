<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\Role;

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
    		Role::create($role);
    	}
    }
}
