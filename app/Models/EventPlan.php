<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventPlan extends Model
{
    use SoftDeletes;

    protected $table = 'event_plans';

    public function toUser()
    {
        return $this->belongsTo(User::class);
    }

    public function toSubject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function toReviews()
    {
        return $this->hasMany(Review::class);
    }

    public function toEventForks()
    {
        return $this->hasMany(EventFork::class);
    }

    public function toEventPlanDetails()
    {
        return $this->hasMany(EventPlanDetail::class);
    }
}
