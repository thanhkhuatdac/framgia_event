<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

    protected $table = 'subjects';
    protected $guarded = [];

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

    public function scopeGetSubjectBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('title', 'like', '%' . $keyword . '%');
    }

    public function scopeGetMenuSubjects($query)
    {
        return $query->orderBy('id', 'ASC')->limit(6)->get();
    }
}
