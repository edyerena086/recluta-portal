<?php

use Faker\Generator as Faker;

$factory->define(ReclutaTI\Language::class, function (Faker $faker) {
	$languages = [
		'ingles',
		'español',
		'frances',
		'italiano',
		'aleman',
		'japones'
	];

    return [
        'name' => $faker->randomElement($languages)
    ];
});
