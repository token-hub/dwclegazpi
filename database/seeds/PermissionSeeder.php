<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
        	['title' => 'Add Role'],
        	['title' => 'Update Role'],
        	['title' => 'Delete Role'],
            ['title' => 'Add User'],
            ['title' => 'Update User'],
            ['title' => 'Delete User'],
            ['title' => 'Add Permission'],
            ['title' => 'Update Permission'],
            ['title' => 'Delete Permission'],
            ['title' => 'Add Inactive Image'],
            ['title' => 'Update Inactive Image'],
            ['title' => 'Delete Inactive Image'],
            ['title' => 'Update Active Image'],
            ['title' => 'Delete Active Image'],
            ['title' => 'View Log'],
        ];

       	foreach ($permissions as $permission) {
       		Permission::create($permission);
       	}
    }
}
