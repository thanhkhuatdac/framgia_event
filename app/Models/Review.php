<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected $table = 'reviews';

    public function toUser()
    {
        return $this->belongsTo(User::class);
    }

    public function toEventPlan()
    {
        return $this->belongsTo(EventPlan::class);
    }

    public function toComments()
    {
        return $this->morphMany(Comment::class);
    }
}
