<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

    protected $table = 'subjects';

    public function eventPlans()
    {
        return $this->hasMany(EventPlan::class);
    }

    public function requestEvents()
    {
        return $this->hasMany(RequestEvent::class);
    }

    public function scopeGetAllSubjects($query)
    {
        return $query->get();
    }
}
