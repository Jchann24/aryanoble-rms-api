<?php

use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'state' => "Card created by PIC, Waiting for talent suggestion from PIC",
        ]);

        DB::table('statuses')->insert([
            'state' => "Talent provided by PIC, Waiting acceptance from User",
        ]);

        DB::table('statuses')->insert([
            'state' => "Talent accepted by User, Waiting candidate account creation by PIC",
        ]);
        DB::table('statuses')->insert([
            'state' => "Candidate Account Created by PIC, Waiting Interview Details to be set.",
        ]);
        DB::table('statuses')->insert([
            'state' => "Interview Details set, Waiting form sent to candidate.",
        ]);
        DB::table('statuses')->insert([
            'state' => "Candidate Form Sent",
        ]);
        DB::table('statuses')->insert([
            'id' => 100,
            'state' => "Card Declined by User",
        ]);
    }
}
