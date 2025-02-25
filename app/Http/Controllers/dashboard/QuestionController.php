<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        $competitions = Competition::all();
        $user = User::first();
        return view('dashboard.questions', compact('questions', 'competitions', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'competition_id' => 'nullable|exists:competitions,id',
            'question' => 'nullable|string',
            'answer' => 'nullable|string',
            'mark_question' => 'nullable|string|max:1',
        ]);

        Question::create($request->all());
        return redirect()->route('questions.index')->with('success', 'Question created successfully.');
    }

    public function show(Question $question)
    {
        return response()->json($question);
    }

    public function update(Request $request, Question $question)
    {
        $request->validate([
            'competition_id' => 'nullable|exists:competitions,id',
            'question' => 'nullable|string',
            'answer' => 'nullable|string',
            'mark_question' => 'nullable|string|max:1',
        ]);

        $question->update($request->all());
        return redirect()->route('questions.index')->with('success', 'Question updated successfully.');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Question deleted successfully.');
    }


    public function updateStatus(Question $question)
    {
        $question->update(['is_active' => false]);
        return redirect()->route('questions.index')->with('success', 'Question status updated successfully.');
    }
}
