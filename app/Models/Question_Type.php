<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Question;


class Question_Type extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function question(){
        return $this->hasMany(Question::class);
    }
}
