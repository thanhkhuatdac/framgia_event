<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventForkDetail extends Model
{
    use SoftDeletes;

    protected $table = 'event_fork_details';
    protected $guarded = [];

    public function eventFork()
    {
        return $this->belongsTo(EventFork::class);
    }

    public function forkPlanServices()
    {
        return $this->hasMany(ForkPlanService::class);
    }

    public function scopeGetById($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeGetDetailOfFork($query, $forkId)
    {
        return $query->where('event_fork_id', $forkId);
    }
}
