<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Wishlist;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Wishlist::class, function (Faker $faker) {
    $user_count = DB::table('users')->get();

    return [
        'user_id'   => $faker->numberBetween($min = 1, $max = $user_count),
        'game_id'   => $faker->randomDigitNotNull,
        'game_name' => $faker->name,
        'game_slug' => $faker->slug,
    ];
});
