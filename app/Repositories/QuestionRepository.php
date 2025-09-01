<?php
namespace App\Repositories;

use App\Repositories\Interfaces\QuestionRepositoryInterface;
use App\Models\Question;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function getAll()
    {
        return Question::all();
    }

    public function findById($id)
    {
        return Question::findOrFail($id);
    }

    public function create(array $data)
    {
        return Question::create($data);
    }

    public function update($id, array $data)
    {
        $question = Question::findOrFail($id);
        $question->update($data);
        return $question;
    }

    public function delete($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return true;
    }
}