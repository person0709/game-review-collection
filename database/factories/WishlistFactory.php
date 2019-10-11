<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Wishlist;
use Faker\Generator as Faker;

$factory->define(Wishlist::class, function (Faker $faker) {
    return [
        'user_id'   => $faker->randomDigitNotNull,
        'game_id'   => $faker->randomDigitNotNull,
        'game_name' => $faker->name,
        'game_slug' => $faker->slug,
    ];
});
