<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Quiz $quiz)
    {
        $questions = $quiz->questions;
        return view('admin.questions.index', compact('quiz', 'questions'));
    }

    public function create(Quiz $quiz)
    {
        return view('admin.questions.create', compact('quiz'));
    }

    public function store(Request $request, Quiz $quiz)
    {
        $request->validate([
            'question_text' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_option' => 'required|in:A,B,C,D',
        ]);

        $quiz->questions()->create($request->only(
            'question_text',
            'option_a',
            'option_b',
            'option_c',
            'option_d',
            'correct_option'
        ));

        return redirect()->route('admin.quizzes.questions.index', $quiz)->with('success', 'Question added successfully.');
    }

    public function edit($id)
{
    $question = Question::findOrFail($id); // Fetch the question by ID
    return view('admin.questions.edit', compact('question'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'question_text' => 'required|string|max:255',
        'option_a' => 'required|string|max:255',
        'option_b' => 'required|string|max:255',
        'option_c' => 'required|string|max:255',
        'option_d' => 'required|string|max:255',
        'correct_option' => 'required|in:a,b,c,d',
    ]);

    $question = Question::findOrFail($id);
    $question->update([
        'question_text' => $request->question_text,
        'option_a' => $request->option_a,
        'option_b' => $request->option_b,
        'option_c' => $request->option_c,
        'option_d' => $request->option_d,
        'correct_option' => $request->correct_option,
    ]);

    return redirect()->route('admin.quizzes.questions.index', $question->quiz_id)
        ->with('success', 'Question updated successfully.');
}

    public function destroy($id)
{
    $question = Question::findOrFail($id); // Fetch the question by ID
    $question->delete();
    return redirect()->back()->with('success', 'Question deleted successfully.');
}
}
