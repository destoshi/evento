<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    $events = App\Event::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'event_id' => $faker->randomElement($events),
    ];
});
