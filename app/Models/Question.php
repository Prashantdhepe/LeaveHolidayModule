<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Standard;
use App\Models\Subject;
use App\Models\ExamType;
use App\Models\Question_type;


class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'standard_id',
        'subject_id',
        'exam_type_id',
        'question_type_id',
        'marks',
        'time',
        
    ];

    public function standard()
    {
        return $this->belongsTo(Standard::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function examType()
    {
        return $this->belongsTo(ExamType::class);
    }

    public function questionType()
    {
        return $this->belongsTo(QuestionType::class);
    }
}
