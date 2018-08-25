<?php

use Faker\Generator as Faker;

$factory->define(ReclutaTI\Role::class, function (Faker $faker) {
	$roles = [
		'candidate',
		'recruiter',
		'admin'
	];

    return [
        'name' => $faker->randomElement($roles),
        'description' => $faker->paragraph
    ];
});
