<?php

namespace App\Services;

use App\Repositories\Interfaces\ExamRepositoryInterface;
use App\Models\Exam;

class ExamService
{
    public function __construct(protected ExamRepositoryInterface $examRepository)
    {

    }

    public function getAllExams(): array
    {
        return $this->examRepository->all();
    }

    public function createExam(array $data): Exam
    {
        return $this->examRepository->create($data);
    }

    public function updateExam(int $id, array $data): ?Exam
    {
        return $this->examRepository->update($id, $data);
    }

    public function deleteExam(int $id): bool
    {
        return $this->examRepository->delete($id);
    }
}
