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
        	['title' => 'add role'],
            ['title' => 'update role'],
            ['title' => 'delete role'],
            ['title' => 'add user'],
            ['title' => 'update user'],
            ['title' => 'delete user'],
            ['title' => 'add permission'],
            ['title' => 'update permission'],
            ['title' => 'delete permission'],
            ['title' => 'add inactive image'],
            ['title' => 'update inactive image'],
            ['title' => 'delete inactive image'],
            ['title' => 'update active image'],
            ['title' => 'delete active image'],
            ['title' => 'view log'],
        ];

       	foreach ($permissions as $permission) {
       		Permission::create($permission);
       	}
    }
}
