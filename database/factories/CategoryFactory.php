<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'       => $faker->word,
        'slug'       => $faker->slug,
        'parent_id'  => $faker->randomNumber,
        'image_path' => $faker->word
    ];
});