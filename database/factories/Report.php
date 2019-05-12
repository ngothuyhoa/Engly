<?php

use Faker\Generator as Faker;
use App\Report;
use App\User;
use App\Post;

$factory->define(Report::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(User::pluck('id')->all()),
        'post_id' => $faker->randomElement(Post::pluck('id')->all()),
        'note' => $faker->sentence
    ];
});
