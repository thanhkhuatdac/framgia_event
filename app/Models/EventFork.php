<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventFork extends Model
{
    use SoftDeletes;

    protected $table = 'event_forks';

    public function toUser()
    {
        return $this->belongsTo(User::class);
    }

    public function toEventPlan()
    {
        return $this->belongsTo(EventPlan::class);
    }

    public function toEventForkDetails()
    {
        return $this->hasMany(EventForkDetail::class);
    }
}
