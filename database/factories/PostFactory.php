<?php

use Faker\Generator as Faker;
use App\Post;
use App\User;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->text,
        'view' => $faker->randomDigit,
        'vote' => $faker->randomDigit,
        'status' => '1',
        'user_id' => $faker->randomElement(User::pluck('id')->all()),
        'slug' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true)
    ];
});
