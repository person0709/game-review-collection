<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {

    return [
        'user_id'   => $faker->randomDigitNotNull,
        'game_id'   => $faker->randomDigitNotNull,
        'game_name' => $faker->name,
        'game_slug' => $faker->slug,
        'pros'      => $faker->text,
        'cons'      => $faker->text,
    ];
});
