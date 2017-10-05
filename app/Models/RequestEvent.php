<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestEvent extends Model
{
    use SoftDeletes;

    protected $table = 'request_events';

    public function toUser()
    {
        return $this->belongsTo(User::class);
    }

    public function toSubject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function toComments()
    {
        return $this->morphMany(Comment::class);
    }
}
