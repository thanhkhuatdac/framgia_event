<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialLink extends Model
{
    use SoftDeletes;

    protected $table = 'social_links';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
