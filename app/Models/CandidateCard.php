<?php

namespace App\models;

use App\Models\Erf;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateCard extends Model
{
    use SoftDeletes;

    protected $table = "candidate_cards";
    protected $guarded = ['id'];

    public function candidate()
    {
        return $this->belongsTo(User::class, "candidate_id");
    }

    public function pic()
    {
        return $this->belongsTo(User::class, "pic_id");
    }


    public function lastUpdatedBy()
    {
        return $this->belongsTo(User::class, "last_updated_by_id");
    }

    public function talent()
    {
        return $this->belongsTo(Talent::class);
    }

    public function erf()
    {
        return $this->belongsTo(Erf::class);
    }

    public function interviewDetail()
    {
        return $this->belongsTo(InterviewDetail::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
