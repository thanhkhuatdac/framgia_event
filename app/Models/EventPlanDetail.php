<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventPlanDetail extends Model
{
    use SoftDeletes;

    protected $table = 'event_plan_details';
    protected $guarded = [];

    public function eventPlan()
    {
        return $this->belongsTo(EventPlan::class);
    }

    public function forkPlanServices()
    {
        return $this->hasMany(ForkPlanService::class);
    }
}
