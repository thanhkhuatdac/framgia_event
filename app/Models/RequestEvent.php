<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestEvent extends Model
{
    use SoftDeletes;

    protected $table = 'request_events';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function scopeGetUserRequestEvents($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function scopeGetRequestEvent($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopeGetAllRequestEvents($query)
    {
        return $query->orderBy('id', 'DESC');
    }
}
