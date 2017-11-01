<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected $table = 'reviews';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventPlan()
    {
        return $this->belongsTo(EventPlan::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function scopeGetReviewsOfPlan($query, $eventPlanId)
    {
        return $query->where('event_plan_id', $eventPlanId);
    }
}
