<?php

use App\Models\Erf;
use Illuminate\Database\Seeder;

class FakeErfsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Erf::class, 40)->create();
    }
}
