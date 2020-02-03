<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'event_title' => $faker->sentence,
        'brief' => $faker->text(350),
        'event_content' => $faker->text(1500),
        'date' => $faker->date('Y-m-d'),
        'country' => $faker->country,
        'city' => $faker->city,
        'speaker' => $faker->name,

    ];
});
