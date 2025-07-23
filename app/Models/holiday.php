<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\holiday_types;

class holiday extends Model
{
    /** @use HasFactory<\Database\Factories\HolidayFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'holiday_type_id',
        'description',
        'created_by',
    ];

    protected static function booted()
    {
        static::creating(function ($holiday) {
            $holiday->created_by = auth()->id();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function holidayType()
    {
        return $this->belongsTo(holiday_types::class);
    }
}
