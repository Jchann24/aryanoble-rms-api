<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ErfAcceptance extends Model
{

    protected $table = 'erf_acceptances';
    protected $guarded = [];

    public function erf()
    {
        return $this->belongsTo(Erf::class);
    }
}
