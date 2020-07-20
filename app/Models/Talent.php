<?php

namespace App\models;

use App\Models\User;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Talent extends Model
{
    use Filterable, SoftDeletes;

    protected $table = 'talents';

    private static $whiteListFilter = [
        'email',
        'name'
    ];

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
