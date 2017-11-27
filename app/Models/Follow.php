<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Follow extends Model
{
    use SoftDeletes;

    protected $table = 'follows';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFindFollow($query, $userFollowing, $userFollower)
    {
        return $query->where('following_id', $userFollowing)->where('follower_id', $userFollower);
    }

    public function scopeDeleteFollow($query, $userFollowing, $userFollower)
    {
        $sql = "DELETE FROM follows WHERE following_id = $userFollowing AND follower_id = $userFollower";

        return DB::select(DB::raw($sql));
    }

    public function scopeFindFollowing($query, $userFollowingId)
    {
        return $query->where('following_id', $userFollowingId);
    }

    public function scopeFindFollower($query, $userFollowerId)
    {
        return $query->where('follower_id', $userFollowerId);
    }
}
