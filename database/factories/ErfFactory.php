<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Erf;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Erf::class, function (Faker $faker) {

    $age_range_from = rand(18, 30);
    $div_users = User::where("group_id", 4)->pluck('id')->toArray();
    $randUser = array_rand($div_users);

    $user = $div_users[$randUser];

    return [
        'div_user_id' => $user,
        'title' => $faker->sentence(8),
        'age_range_from' => $age_range_from,
        'age_range_to' => random_int($age_range_from, 55),
        'branch' => $faker->word(),
        'business_justification' => $faker->paragraph(),
        'department' => $faker->word(),
        'division' => $faker->word(),
        'education' => $faker->randomElement($array = array('S1', 'S2', 'S3')),
        'employee_status' => $faker->randomElement($array = array('Permanent', 'Internship', 'Contract')),
        'job_title' => $faker->sentence(),
        'min_experience' => random_int(0, 10),
        'planning' => $faker->randomElement($array = array('Planned', 'Not Planned')),
        'purpose' => $faker->randomElement($array = array('Replacement', 'Additional')),
        'quantity' => random_int(0, 10),
        'sex' => $faker->randomElement($array = array('Male', 'Female', 'Male / Female')),
        'technical_competencies' => $faker->paragraph(),
        'work_location' => $faker->streetName,
        'working_hours' => $faker->randomElement($array = array('Part-Time', 'Full-Time')),
        'position' => $faker->randomElement($array = array('Leader', 'Non-leader')),
        'company' => $faker->company,
        'created_at' => $faker->dateTime(),
        'updated_at' => null,
    ];
});
