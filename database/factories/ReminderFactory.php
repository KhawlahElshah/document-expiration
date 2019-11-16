<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Reminder;
use Faker\Generator as Faker;

$factory->define(Reminder::class, function (Faker $faker) {
    return [
        'notification_date' => $faker->date(),
        'document_id'       => factory('App\Document')
    ];
});