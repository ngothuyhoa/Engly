<?php

use Faker\Generator as Faker;
use App\Image;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'url' => $faker->imageUrl,
        'imageable_id' => $faker->numberBetween($min = 1, $max = 30),
        'imageable_type' => $faker->randomElement($array = array ('App\User', 'App\Post')),
    ];
});
