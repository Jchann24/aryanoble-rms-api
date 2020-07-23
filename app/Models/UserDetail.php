<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{
    use SoftDeletes;

    protected $table = 'user_details';

    protected $fillable = [
        'user_id', 'full_name', 'dob', 'phone_num',
        'address', 'city', 'province', 'postal_code',
        'about_me', 'degree', 'university', 'faculty'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
