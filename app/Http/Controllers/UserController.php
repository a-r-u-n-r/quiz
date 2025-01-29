<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizResult;
use App\Models\Achievement;

class UserController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();

        $leaderboard = QuizResult::with(['user', 'quiz'])
            ->orderByDesc('score')
            ->paginate(50);

        $userQuizResults = auth()->user()->quizResults();
        $totalQuizzes = $quizzes->count();
        $completedQuizzes = $userQuizResults->count();
        $topScore = $leaderboard->max('score');
        $averageScore = number_format($userQuizResults->avg('score') ?? 0, 2);

        $recentActivity = $userQuizResults->with('quiz')->latest()->limit(10)->get();

        $achievements = Achievement::where('user_id', auth()->id())->get();

        $recommendedQuizzes = Quiz::whereNotIn('id', function ($query) {
            $query->select('quiz_id')
                ->from('quiz_results')
                ->where('user_id', auth()->id());
        })->limit(5)->get();

        $rank = QuizResult::selectRaw('user_id, SUM(score) as total_score')
            ->groupBy('user_id')
            ->orderByDesc('total_score')
            ->pluck('user_id')
            ->search(auth()->id()) + 1;

        return view('user.dashboard', compact(
            'quizzes',
            'leaderboard',
            'recentActivity',
            'achievements',
            'recommendedQuizzes',
            'totalQuizzes',
            'completedQuizzes',
            'topScore',
            'averageScore',
            'rank'
        ));
    }

    public function startQuiz(Quiz $quiz)
    {
        if ($quiz->questions->isEmpty()) {
            return redirect()->route('user.dashboard')->with('error', 'This quiz has no questions.');
        }

        $quiz->load('questions');
        return view('user.quiz.start', compact('quiz'));
    }

    public function submitQuiz(Request $request, Quiz $quiz)
    {
        $score = 0;
        $results = [];

        if ($quiz->questions->isEmpty()) {
            return redirect()->route('user.dashboard')->with('error', 'This quiz has no questions.');
        }

        foreach ($quiz->questions as $question) {
            $userAnswer = $request->input("question.{$question->id}");
            $correctAnswer = $question->correct_option;

            if (trim(strtolower($userAnswer)) === trim(strtolower($correctAnswer))) {
                $score++;
            }

            $results[$question->id] = [
                'question' => $question->question_text,
                'correct_answer' => $correctAnswer,
                'user_answer' => $userAnswer,
                'is_correct' => trim((string)$userAnswer) === trim((string)$correctAnswer),
            ];
        }

        $quizResult = QuizResult::create([
            'user_id' => auth()->id(),
            'quiz_id' => $quiz->id,
            'score' => $score,
        ]);

        $achievementTitle = '';
        if ($score === $quiz->questions->count()) {
            $achievementTitle = 'Excellent!';
        } elseif ($score >= $quiz->questions->count() * 0.8) {
            $achievementTitle = 'Very Good';
        } elseif ($score >= $quiz->questions->count() * 0.6) {
            $achievementTitle = 'Good';
        } else {
            $achievementTitle = 'Improve';
        }

        $existingAchievement = Achievement::where('user_id', auth()->id())
            ->where('quiz_id', $quiz->id)
            ->first();

        if ($existingAchievement) {
            $existingAchievement->update([
                'title' => $achievementTitle,
                'description' => "Achieved $achievementTitle in the {$quiz->title} quiz!",
            ]);
        } else {
            Achievement::create([
                'user_id' => auth()->id(),
                'quiz_id' => $quiz->id,
                'title' => $achievementTitle,
                'description' => "Achieved $achievementTitle in the {$quiz->title} quiz!",
            ]);
        }

        return view('user.quiz.results', compact('quiz', 'score', 'results'));
    }
}
