<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventPlanDetail extends Model
{
    use SoftDeletes;

    protected $table = 'event_plan_details';

    public function toEventPlan()
    {
        return $this->belongsTo(EventPlan::class);
    }

    public function toServices()
    {
        return $this->hasMany(Service::class);
    }
}
