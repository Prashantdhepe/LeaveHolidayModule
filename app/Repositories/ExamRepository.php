<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ExamRepositoryInterface;
use App\Models\Exam;

class ExamRepository implements ExamRepositoryInterface
{
    public function all(): array
    {
        return Exam::all()->toArray();
    }

    public function create(array $data): Exam
    {
        return Exam::create($data);
    }

    public function update(int $id, array $data): ?Exam
    {
        $exam = Exam::find($id);
        if ($exam) {
            $exam->update($data);
            return $exam;
        }
        return null;
    }
    

    public function delete(int $id): bool
    {
        $exam = Exam::find($id);
        if ($exam) {
            $exam->delete();
            return true;
        }
        return false;
    }
}
