<?php
namespace App\Services;

use App\Repositories\QuestionRepositoryInterface;
use App\Models\Question;

class QuestionService
{

    public function __construct(protected QuestionRepositoryInterface $questionRepository)
    {
    }

    public function getAllQuestions()
    {
        return $this->questionRepository->getAll();
    }

    public function getQuestionById($id)
    {
        return $this->questionRepository->findById($id);
    }

    public function createQuestion(array $data)
    {
        return $this->questionRepository->create($data);
    }

    public function updateQuestion($id, array $data)
    {
        return $this->questionRepository->update($id, $data);
    }

    public function deleteQuestion($id)
    {
        return $this->questionRepository->delete($id);
    }
}