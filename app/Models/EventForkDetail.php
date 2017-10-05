<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventForkDetail extends Model
{
    use SoftDeletes;

    protected $table = 'event_fork_details';

    public function toEventFork()
    {
        return $this->belongsTo(EventFork::class);
    }

    public function toServices()
    {
        return $this->hasMany(Service::class);
    }
}
