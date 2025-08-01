<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Event;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

