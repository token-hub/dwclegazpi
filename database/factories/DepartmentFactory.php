<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Entities\Departments::class, function (Faker $faker) {
    return [
        'department_name' => $faker->name,
    ];
});
