<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $table = 'services';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function forkPlanServices()
    {
        return $this->hasMany(ForkPlanService::class);
    }
}
