<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use SoftDeletes;

    protected $table = 'albums';
    protected $guarded = [];

    public function eventPlan()
    {
        return $this->belongsTo(EventPlan::class);
    }
}
