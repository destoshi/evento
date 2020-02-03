<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $users = factory(App\User::class,50)->create();
        $events = factory(App\Event::class,100)->create();
        $sessions = factory(App\Session::class,200)->create();
        $tickets = factory(App\Ticket::class,400)->create();
    }
}
