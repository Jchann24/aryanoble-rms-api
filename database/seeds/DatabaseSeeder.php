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
        $this->call(GroupsSeeder::class);
        $this->call(SuperUserSeeder::class);
        $this->call(FakeUsersSeeder::class);
        $this->call(StatusesSeeder::class);
        $this->call(FakeTalentsSeeder::class);
        $this->call(FakeErfsSeeder::class);
        $this->call(FakeInterviewDetailsSeeder::class);
        $this->call(FakeCandidateCardsSeeder::class);
    }
}
