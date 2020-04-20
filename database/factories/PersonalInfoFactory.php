<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Personal_info::class, function (Faker $faker) {
    return [
      'firstname' => $faker->firstNameMale,
      'lastname' => $faker->lastName,
      'gender' => 'male',
    ];
});
