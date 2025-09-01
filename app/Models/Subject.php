<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Exam;
use App\Models\Question;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'standard_id'
    ];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function question(){
        return $this->hasMany(Question::class);
    }
}
