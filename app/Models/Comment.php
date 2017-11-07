<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'comments';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function scopeGetCommentsByRequestEvent($query, $request_event_id)
    {
        return $query->where('commentable_type', 'request_events')
            ->where('commentable_id', $request_event_id);
    }
}
