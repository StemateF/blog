<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(60, 5),
        'body' => $faker->realText(rand(500, 1000), 5),
        'excerp' => $faker->realText(rand(100, 200), 5),
        'user_id' => 1,
    ];
});
