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
       factory(App\Models\Entities\User::class, 1)->create()->each(function ($user) {
       	 $user->Personal_info()->save(factory(App\Models\Entities\Personal_info::class)->make());
       	 $user->Departments()->save(factory(App\Models\Entities\Departments::class)->make());
       });
       $this->call(ImageSeeder::class);
    }
}
