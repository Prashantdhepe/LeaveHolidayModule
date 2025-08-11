<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ExamType;
use App\Models\Standard;
use App\Models\Subject;

class Exam extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'standard_id', 
        'subject_id', 
        'exam_type_id',
        'exam_date', 
        'start_time', 
        'end_time'
    ];

    public function examType()
    {
        return $this->belongsTo(ExamType::class);
    }

    public function standard()
    {
        return $this->belongsTo(Standard::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
