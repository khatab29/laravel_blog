<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' =>  $faker->company,
        'content' => $faker->realText(600),
        'summary' => $faker->realText(60),
        'image' => $faker->imageUrl(640 ,480, 'business')
    ];
});
