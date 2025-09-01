<?php
namespace App\Http\Controllers;

use App\Services\QuestionService;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{

    public function __construct(protected QuestionService $questionService)
    {
    }

    public function index()
    {
        return response()->json($this->questionService->getAllQuestions());
    }

    public function show($id)
    {
        return response()->json($this->questionService->getQuestionById($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'standard_id' => 'required|exists:standards,id',
            'subject_id' => 'required|exists:subjects,id',
            'exam_type_id' => 'required|exists:exam_types,id',
            'question_type_id' => 'required|exists:question__types,id',
            'marks' => 'required|integer',
            'time' => 'required|integer',
            
        ]);

        return response()->json($this->questionService->createQuestion($data), 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'standard_id' => 'required|exists:standards,id',
            'subject_id' => 'required|exists:subjects,id',
            'exam_type_id' => 'required|exists:exam_types,id',
            'question_type_id' => 'required|exists:question__types,id',
            'marks' => 'required|integer',
            'time' => 'required|integer',
            
        ]);

        return response()->json($this->questionService->updateQuestion($id, $data));
    }

    public function destroy($id)
    {
        $this->questionService->deleteQuestion($id);
        return response()->json(['message' => 'Question deleted successfully']);
    }
}
