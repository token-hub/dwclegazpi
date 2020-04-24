<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Entities\Personal_info::class, function (Faker $faker) {
    return [
      'firstname' => $faker->name,
      'lastname' => $faker->name,
      'gender' => 'male',
    ];
});
