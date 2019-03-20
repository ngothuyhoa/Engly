<?php

use Faker\Generator as Faker;
use App\Tag;

$factory->define(Tag::class, function (Faker $faker) {
    return [
    	'name' => $faker->sentence,
        'slug' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true)
    ];
});
