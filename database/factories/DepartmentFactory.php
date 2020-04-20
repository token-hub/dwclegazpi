<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Departments::class, function (Faker $faker) {
    return [
        'department_name' => $faker->name,
    ];
});
