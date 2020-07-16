<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $table = 'statuses';

    protected $guarded = ['id', 'state'];

    public function candidateCards()
    {
        return $this->hasMany(CandidateCards::class);
    }
}
