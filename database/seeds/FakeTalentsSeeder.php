<?php

use App\models\Talent;
use Illuminate\Database\Seeder;

class FakeTalentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Talent::class, 40)->create();
    }
}
