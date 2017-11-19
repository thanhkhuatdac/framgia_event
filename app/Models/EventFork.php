<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventFork extends Model
{
    use SoftDeletes;

    protected $table = 'event_forks';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventPlan()
    {
        return $this->belongsTo(EventPlan::class);
    }

    public function eventForkDetails()
    {
        return $this->hasMany(EventForkDetail::class);
    }

    public function scopeGetById($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeGetUserEventForks($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
