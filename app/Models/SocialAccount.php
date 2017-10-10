<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialAccount extends Model
{
    use SoftDeletes;

    protected $table = 'social_accounts';

    protected $fillable = [
        'social_type',
        'social_id',
        'user_id',
    ];

    public function toUser()
    {
        return $this->belongsTo(User::class);
    }
}
