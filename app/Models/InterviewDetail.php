<?php

namespace App\models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InterviewDetail extends Model
{
    use SoftDeletes;

    protected $table = 'interview_details';
    protected $guarded = ['id'];

    public function candidateCard()
    {
        return $this->hasOne(CandidateCard::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
