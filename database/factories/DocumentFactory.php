<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Document;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'name'        => $faker->word,
        'notes'       => $faker->sentence(),
        'expiry_date' => $faker->date,
        'category_id' => factory('App\Category'),
        'user_id'     => factory('App\User')
    ];
});
