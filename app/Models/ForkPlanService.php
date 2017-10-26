<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForkPlanService extends Model
{
    use SoftDeletes;

    protected $table = 'fork_plan_services';

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function eventPlanDetail()
    {
        return $this->belongsTo(EventPlanDetail::class);
    }

    public function eventForkDetail()
    {
        return $this->belongsTo(EventForkDetail::class);
    }
}
