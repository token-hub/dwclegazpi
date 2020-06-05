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
            ['title' => 'add inactive slide'],
            ['title' => 'update inactive slide'],
            ['title' => 'delete inactive slide'],
            ['title' => 'update active slide'],
            ['title' => 'delete active slide'],
            ['title' => 'add updates'],
            ['title' => 'update updates'],
            ['title' => 'delete updates'],
            ['title' => 'view log'],
        ];

       	foreach ($permissions as $permission) {
       		Permission::create($permission);
       	}
    }
}
