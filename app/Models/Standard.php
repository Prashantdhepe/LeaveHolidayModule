<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Exam;

class Standard extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
