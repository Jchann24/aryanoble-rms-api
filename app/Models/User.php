<?php

namespace App\Models;

use App\Http\Middleware\Custom\Candidate;
use App\models\CandidateCard;
use App\models\Talent;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes, Filterable;

    protected $table = 'users';
    /**
     * @var array
     */
    private static $whiteListFilter = [
        'email',
        'name'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'group_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function erfs()
    {
        return $this->hasMany(Erf::class, 'div_user_id');
    }

    public function talentPics()
    {
        return $this->hasMany(Talent::class, 'pic_id');
    }

    public function talentCandidateAccount()
    {
        return $this->hasOne(Talent::class, 'candidate_account_id');
    }

    public function cardCandidate()
    {
        return $this->hasOne(CandidateCard::class, 'candidate_id');
    }

    public function cardPics()
    {
        return $this->hasMany(CandidateCard::class, 'pic_id');
    }

    public function cardLastUpdates()
    {
        return $this->hasMany(CandidateCard::class, 'last_updated_by_id');
    }

    public function interviewDetail()
    {
        return $this->hasMany(InterviewDetail::class, 'admin_id');
    }

    public function userDetail()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable')->latest();
    }


    public function is($groupName)
    {
        if ($this->group->name == $groupName) {
            return true;
        } else {
            return false;
        }
    }
}
