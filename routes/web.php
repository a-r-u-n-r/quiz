<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Admin routes (protected by role middleware)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/quizzes', [AdminController::class, 'showAllQuizzes'])->name('admin.quizzes.showAll');
    Route::get('/admin/leaderboard', [AdminController::class, 'leaderboard'])->name('admin.quizzes.leaderboard');
    Route::get('/admin/reports/monthly/pdf', [AdminController::class, 'exportMonthlyReportPDF'])->name('admin.reports.monthly.pdf');

    
    Route::resource('quizzes', QuizController::class)->names('admin.quizzes');
    Route::resource('quizzes.questions', QuestionController::class)
        ->shallow()
        ->names('admin.quizzes.questions');
});

// User routes (protected by role middleware)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user/quiz/{quiz}', [UserController::class, 'startQuiz'])->name('user.quiz.start');
    Route::post('/user/quiz/{quiz}/submit', [UserController::class, 'submitQuiz'])->name('user.quiz.submit');
    Route::get('/user/quiz/{quiz}/results', [UserController::class, 'quizResults'])->name('user.quiz.results');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
