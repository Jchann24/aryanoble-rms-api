<?php

use App\models\InterviewDetail;
use Illuminate\Database\Seeder;

class FakeInterviewDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(InterviewDetail::class, 100)->create();
    }
}
