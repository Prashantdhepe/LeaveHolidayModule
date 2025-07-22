<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class holiday_types extends Model
{
    protected $fillable = [
        'name',
    ];

    public function holidays()
    {
        return $this->hasMany(holiday::class);
    }
}
