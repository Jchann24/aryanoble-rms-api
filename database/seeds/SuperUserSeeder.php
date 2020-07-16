<?php

use Illuminate\Database\Seeder;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Super User",
            'email' => "superuser@aryanoble.co.id",
            'password' => bcrypt('123123!@#'),
            'group_id' => 1,
        ]);
    }
}
