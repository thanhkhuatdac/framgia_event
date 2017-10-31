<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventPlan extends Model
{
    use SoftDeletes;

    protected $table = 'event_plans';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function eventForks()
    {
        return $this->hasMany(EventFork::class);
    }

    public function eventPlanDetails()
    {
        return $this->hasMany(EventPlanDetail::class);
    }

    public function album()
    {
        return $this->hasMany(Album::class);
    }

    public function scopeGetUserEventPlans($query, $id)
    {
        return $query->where('user_id', $id);
    }

    public function scopeGetEventPlan($query, $slug)
    {
        return $query->where('slug', $slug)->first();
    }
}
