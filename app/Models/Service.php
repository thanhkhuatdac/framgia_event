<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $table = 'services';

    public function eventForkDetail()
    {
        return $this->belongsTo(EventForkDetail::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function eventPlanDetail()
    {
        return $this->belongsTo(EventPlanDetail::class);
    }
}
