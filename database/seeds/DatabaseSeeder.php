<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database
.     *
     * @return void
     */
    public function run()
    {
        $this->call(ImageSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        
       factory(App\Models\Entities\User::class, 3)->create()->each(function ($user)
       {
         static $cnt = 1; 
       	 $user->Personal_info()->save(factory(App\Models\Entities\Personal_info::class)->make());
       	 $user->Department()->save(factory(App\Models\Entities\Department::class)->make());
        
        # create permission ids
        $permissionsId = [];
        for ($i = 1; $i <= 15; $i++){
            array_push($permissionsId, $i);
        }

        # sycn to the admin role
        $role = App\Models\Entities\Role::first();
        $role->permissions()->sync($permissionsId);

        # attach roles to users
        $user->roles()->attach([$cnt++]);

       });

       $this->call(UserSeeder::class);
    }
}
