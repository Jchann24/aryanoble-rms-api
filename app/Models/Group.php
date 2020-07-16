<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $guarded = ['id', 'name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
