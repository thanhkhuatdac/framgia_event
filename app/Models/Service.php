<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $table = 'services';

    public function toEventForkDetail()
    {
        return $this->belongsTo(EventForkDetail::class);
    }

    public function toCategory()
    {
        return $this->belongsTo(Category::class);
    }

    public function toEventPlanDetail()
    {
        return $this->belongsTo(EventPlanDetail::class);
    }
}
