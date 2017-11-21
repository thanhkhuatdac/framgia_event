<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialLink extends Model
{
    use SoftDeletes;

    protected $table = 'social_links';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeGetByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeGetLink($query, $userId, $name)
    {
        return $query->where('user_id', $userId)->where('name', $name);
    }
}
