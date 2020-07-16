<?php

use App\Models\Erf;
use App\models\Talent;
use App\Models\User;
use Illuminate\Database\Seeder;

class FakeUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "pic_ta_1",
            'email' => "pic_ta_1@aryanoble.co.id",
            'password' => bcrypt('123123!@#'),
            'group_id' => 3,
        ]);

        DB::table('users')->insert([
            'name' => "pic_ta_2",
            'email' => "pic_ta_2@aryanoble.co.id",
            'password' => bcrypt('123123!@#'),
            'group_id' => 3,
        ]);

        DB::table('users')->insert([
            'name' => "admin_ta_1",
            'email' => "admin_ta_1@aryanoble.co.id",
            'password' => bcrypt('123123!@#'),
            'group_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => "admin_ta_2",
            'email' => "admin_ta_2@aryanoble.co.id",
            'password' => bcrypt('123123!@#'),
            'group_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => "div_user_1",
            'email' => "div_user_1@aryanoble.co.id",
            'password' => bcrypt('123123!@#'),
            'group_id' => 4,
        ]);

        DB::table('users')->insert([
            'name' => "div_user_2",
            'email' => "div_user_2@aryanoble.co.id",
            'password' => bcrypt('123123!@#'),
            'group_id' => 4,
        ]);

        factory(User::class, 40)->create();
    }
}
