<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\InterviewDetail;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(InterviewDetail::class, function (Faker $faker) {

    $admins = User::where('group_id', 2)->pluck('id')->toArray();
    $randAdmin = array_rand($admins);

    $admin = $admins[$randAdmin];

    return [
        'location' => $faker->streetAddress,
        'date_time' => $faker->dateTime(),
        'admin_id' => $admin
    ];
});
