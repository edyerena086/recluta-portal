<?php

use Faker\Generator as Faker;

$factory->define(ReclutaTI\Candidate::class, function (Faker $faker) {
    return [
        'user_id' => factory(\ReclutaTI\User::class)->create(['role_id' => 1])->id,
        'last_name' => $faker->lastName,
        'second_last_name' => $faker->lastName,
        'gender_id' => rand(1, 2)
    ];
});
