<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\CandidateCard;
use App\Models\Erf;
use App\models\InterviewDetail;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(CandidateCard::class, function (Faker $faker) {

    $pics = User::where("group_id", 3)->pluck('id')->toArray();
    $randPic = array_rand($pics);
    $pic = $pics[$randPic];

    $candidates = User::where("group_id", 5)
        ->pluck('id')->toArray();
    $randCandidate = array_rand($candidates);
    $candidate = $candidates[$randCandidate];

    $erfs = Erf::all()->pluck('id')->toArray();
    $randErf = array_rand($erfs);
    $erf = $erfs[$randErf];

    $interviewDetails = InterviewDetail::doesntHave("candidateCard")->pluck('id')->toArray();
    $randDetail = array_rand($interviewDetails);
    $interviewDetail = $interviewDetails[$randDetail];


    return [
        'status_id' => 1,
        'candidate_id' => $candidate,
        'erf_id' => $erf,
        'pic_id' => $pic,
        'talent_id' => random_int(1, 10),
        'interview_detail_id' => $interviewDetail,
        'last_updated_by_id' => $pic
    ];
});
