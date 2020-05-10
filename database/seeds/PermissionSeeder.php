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
        ];

       	foreach ($permissions as $permission) {
       		Permission::create($permission);
       	}
    }
}
