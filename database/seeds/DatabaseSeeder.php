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

       factory(App\Models\Entities\User::class, 1)->create()->each(function ($user)
       {
       	 $user->Personal_info()->save(factory(App\Models\Entities\Personal_info::class)->make());
       	 $user->Departments()->save(factory(App\Models\Entities\Departments::class)->make());
         $user->roles()->attach(App\Models\Entities\roles::where('id', '>', '0')->pluck('id'));
       });
       
    }
}
