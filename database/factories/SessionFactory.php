<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Session;
use Faker\Generator as Faker;

$factory->define(Session::class, function (Faker $faker) {
    $events = App\Event::pluck('id')->toArray();
    return [
        'event_id' => $faker->randomElement($events),
        'session_title' => $faker->sentence,
        'session_content' => $faker->text(1500),

    ];
});
