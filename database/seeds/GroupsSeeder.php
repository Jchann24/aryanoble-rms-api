<?php

use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => "Superuser",
        ]);
        DB::table('groups')->insert([
            'name' => "Admin_TA_Group",
        ]);
        DB::table('groups')->insert([
            'name' => "PIC_TA_Group",
        ]);
        DB::table('groups')->insert([
            'name' => "Div_User_Group",
        ]);
        DB::table('groups')->insert([
            'name' => "Candidate_Group",
        ]);

    }
}
