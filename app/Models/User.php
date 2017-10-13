<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function toSocialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function toRelations()
    {
        return $this->hasMany(Relation::class);
    }

    public function toSocialLinks()
    {
        return $this->hasMany(SocialLink::class);
    }

    public function toEventPlans()
    {
        return $this->hasMany(EventPlan::class);
    }

    public function toRequestEvents()
    {
        return $this->hasMany(RequestEvent::class);
    }

    public function toReviews()
    {
        return $this->hasMany(Review::class);
    }

    public function toComments()
    {
        return $this->hasMany(Comment::class);
    }

    public function toEventForks()
    {
        return $this->hasMany(EventFork::class);
    }

    public function scopeGetUser($query, $id)
    {
        return $query->where('id', $id);
    }
}
