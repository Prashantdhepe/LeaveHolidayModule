<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ExamService;

class ExamController extends Controller
{
    public function __construct(protected ExamService $examService)
    {
    }

    /**
     * Display a listing of the exams.
     */
    public function index()
    {
        $exams = $this->examService->getAllExams();
        return response()->json($exams);
    }

    /**
     * Store a newly created exam in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'standard_id' => 'required|exists:standards,id',
            'subject_id' => 'required|exists:subjects,id',
            'exam_type_id' => 'required|exists:exam_types,id',
            'exam_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $exam = $this->examService->createExam($data);
        return response()->json($exam, 201);
    }

    /**
     * Display the specified exam.
     */
    public function show(int $id)
    {
        $exam = $this->examService->getExamById($id);
        return response()->json($exam);
    }

    /**
     * Update the specified exam in storage.
     */
    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'standard_id' => 'sometimes|required|exists:standards,id',
            'subject_id' => 'sometimes|required|exists:subjects,id',
            'exam_type_id' => 'sometimes|required|exists:exam_types,id',
            'exam_date' => 'sometimes|required|date',
            'start_time' => 'sometimes|required|date_format:H:i',
            'end_time' => 'sometimes|required|date_format:H:i|after:start_time',
        ]);

        $exam = $this->examService->updateExam($id, $data);
        return response()->json($exam);
    }

    /**
     * Remove the specified exam from storage.
     */
    public function destroy(int $id)
    {
        $deleted = $this->examService->deleteExam($id);
        return response()->json(['deleted' => $deleted]);
    }
}