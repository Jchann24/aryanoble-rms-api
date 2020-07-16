<?php

use App\models\CandidateCard;
use Illuminate\Database\Seeder;

class FakeCandidateCardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CandidateCard::class, 100)->create();
    }
}
