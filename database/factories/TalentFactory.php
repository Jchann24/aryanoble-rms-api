<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\Talent;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Talent::class, function (Faker $faker) {

    $pics = User::where("group_id", 3)->pluck('id')->toArray();
    $candidates = User::where("group_id", 5)
        ->doesntHave("talentCandidateAccount")
        ->pluck('id')->toArray();
    $randPic = array_rand($pics);
    $randCandidate = array_rand($candidates);

    $pic = $pics[$randPic];
    $candidate = $candidates[$randCandidate];
    return [
        'pic_id' => $pic,
        'candidate_account_id' => $candidate,
        'name'  => $faker->name(),
        'source' => $faker->company,
        'cv' => $faker->file('storage/app/public/cv/', 'storage/app/public/cv2/'),
        'address' => $faker->address,
        'applied_position' => $faker->sentence(3),
        'dob' => $faker->date(),
        'email' => $faker->safeEmail,
        'gender' => $faker->randomElement($array = array('M', 'F', 'M/F')),
        'last_education' => $faker->randomElement($array = array('S1', 'S2', 'S3')),
        'mobile_phone' => $faker->phoneNumber,
        'nik' => $faker->creditCardNumber,
        'total_working_experience' => random_int(0, 10),
        'university' => $faker->company,
    ];
});
