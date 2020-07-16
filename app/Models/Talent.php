<?php

namespace App\models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Talent extends Model
{
    use SoftDeletes;

    protected $table = 'talents';
    protected $guarded = [];

    public function pic()
    {
        return $this->belongsTo(User::class, 'pic_id');
    }

    public function candidateAccount()
    {
        return $this->belongsTo(User::class, 'candidate_account_id');
    }

    public function candidateCards()
    {
        return $this->hasMany(CandidateCard::class);
    }
}
