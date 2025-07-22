<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\leave;

class leave_types extends Model
{
    protected $fillable = [
        'name',
        'allowed_per_year',
    ];

    public function leaves()
    {
        return $this->hasMany(leave::class);
    }
}
