<?php

use Faker\Generator as Faker;
use App\Comment;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body'=> $faker->realText(rand(500, 1000), 5),
        'post_id' => 1,
        'user_id'=>1,
    ];
});
