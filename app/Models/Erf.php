<?php

namespace App\Models;

use App\models\CandidateCard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Erf extends Model
{
    use SoftDeletes;

    protected $table = 'erfs';
    protected $guarded = ['id'];

    public function divUser()
    {
        return $this->belongsTo(User::class, 'div_user_id');
    }

    public function candidateCards()
    {
        return $this->hasMany(CandidateCard::class);
    }

    public function erfAcceptance()
    {
        return $this->hasOne(ErfAcceptance::class);
    }
}
