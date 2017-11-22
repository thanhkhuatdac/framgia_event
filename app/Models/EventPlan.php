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

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function scopeGetUserEventPlans($query, $id)
    {
        return $query->where('user_id', $id);
    }

    public function scopeGetEventPlan($query, $slug)
    {
        return $query->where('slug', $slug)->where('active', 1);
    }

    public function scopeGetEventPlanNoActive($query, $slug)
    {
        return $query->where('slug', $slug)->where('active', 0);
    }

    public function scopeRelatedEvents($query, $subjectId, $dismissId)
    {
        return $query->where('subject_id', $subjectId)->where('active', 1)
            ->whereNotIn('id', [$dismissId]);
    }

    public function scopeGetEventPlanById($query, $eventPlanId)
    {
        return $query->where('id', $eventPlanId)->where('active', 1);
    }

    public function scopeGetEventPlanBySubject($query, $subjectId)
    {
        return $query->where('subject_id', $subjectId)->where('active', 1)->orderBy('id', 'DESC');
    }

    public function scopeGetAll($query)
    {
        return $query->where('active', 1)->orderBy('id', 'ASC');
    }

    public function scopeGetPending($query)
    {
        return $query->where('active', 0)->orderBy('id', 'ASC');
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('title','like','%'.$keyword.'%');
    }
}
