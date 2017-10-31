<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Relation extends Model
{
    use SoftDeletes;

    protected $table = 'relations';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
