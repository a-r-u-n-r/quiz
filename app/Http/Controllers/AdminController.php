<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizResult;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    // Admin Dashboard
    public function index()
    {
        $quizzes = Quiz::all();
        $users = User::all();
        $newUsersThisWeek = User::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();

        return view('admin.dashboard', compact('quizzes', 'users', 'newUsersThisWeek'));
    }

    // Show All Quizzes
    public function showAllQuizzes()
    {
        $quizzes = Quiz::paginate(10);
        return view('admin.quizzes.show', compact('quizzes'));
    }

    // Show Leaderboard
    public function leaderboard()
    {
        $quizResults = QuizResult::with(['user', 'quiz'])
            ->orderBy('score', 'desc')
            ->paginate(50);

        $users = User::all();
        return view('admin.quizzes.leaderboard', compact('quizResults', 'users'));
    }

    // Export Monthly Report with Quiz Statistics
    public function exportMonthlyReportPDF()
    {
        // Get the current month
        $currentMonth = now()->month;

        // Fetch general data for the report
        $monthlyQuizzes = Quiz::whereMonth('created_at', $currentMonth)->count();
        $monthlyUsers = User::whereMonth('created_at', $currentMonth)->count();
        $monthlyQuizParticipations = QuizResult::whereMonth('created_at', $currentMonth)->count();

        // Fetch the most popular quiz (with the highest number of results)
        $mostPopularQuiz = Quiz::withCount('results')
            ->whereMonth('created_at', $currentMonth)
            ->orderByDesc('results_count')
            ->first();

        // Calculate the average score for the current month
        $averageQuizScore = QuizResult::whereMonth('created_at', $currentMonth)->avg('score') ?? 0;
        $highestScore = QuizResult::whereMonth('created_at', now()->month)->max('score') ?? 0;
        $lowestScore = QuizResult::whereMonth('created_at', now()->month)->min('score') ?? 0;
        
        // Handle cases where no quizzes exist in the current month
        $mostPopularQuizTitle = $mostPopularQuiz ? $mostPopularQuiz->title : 'No data available';
        $mostPopularQuizParticipations = $mostPopularQuiz ? $mostPopularQuiz->results_count : 0;

        // Pass data to a PDF view
        $pdf = Pdf::loadView('admin.reports.pdf', [
            'monthlyQuizzes' => $monthlyQuizzes,
            'monthlyUsers' => $monthlyUsers,
            'monthlyQuizParticipations' => $monthlyQuizParticipations,
            'mostPopularQuizTitle' => $mostPopularQuizTitle,
            'mostPopularQuizParticipations' => $mostPopularQuizParticipations,
            'averageQuizScore' => number_format($averageQuizScore, 2),
            'highestScore' => $highestScore,
            'lowestScore' => $lowestScore
        ]);

        // Download PDF with a filename
        return $pdf->download('monthly_report_' . now()->format('F_Y') . '.pdf');
    }
}
