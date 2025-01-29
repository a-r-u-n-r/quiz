@extends('admin.layout.master')
@section('title', 'Admin Dashboard')
@section('content')
<div class="container my-5">

    <h1 class="text-center display-4 fw-bold">Welcome to <span class="text-primary">Quizify</span></h1>
    <hr class="modern-hr">

    <!-- Dashboard Header -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="fw-bold text-dark">Admin Dashboard</h1>
    </div>

    <!-- Cards Section -->
    <div class="row g-4 mt-5">
        <!-- Total Quizzes Card -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card shadow-sm border-0 gradient-bg-blue rounded-4 h-100">
                <div class="card-body d-flex flex-column align-items-center text-center text-white">
                    <i class="fas fa-file-alt fs-1 mb-3"></i>
                    <h5 class="fw-bold">Total Quizzes</h5>
                    <h2 class="display-6 fw-bold">{{ $quizzes->count() }}</h2>
                </div>
            </div>
        </div>

        <!-- Total Questions Card -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card shadow-sm border-0 gradient-bg-green rounded-4 h-100">
                <div class="card-body d-flex flex-column align-items-center text-center text-white">
                    <i class="fas fa-question-circle fs-1 mb-3"></i>
                    <h5 class="fw-bold">Total Questions</h5>
                    <h2 class="display-6 fw-bold">{{ $quizzes->sum(fn($quiz) => $quiz->questions->count()) }}</h2>
                </div>
            </div>
        </div>

        <!-- Total Users Card -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card shadow-sm border-0 gradient-bg-orange rounded-4 h-100">
                <div class="card-body d-flex flex-column align-items-center text-center text-white">
                    <i class="fas fa-users fs-1 mb-3"></i>
                    <h5 class="fw-bold">Total Users</h5>
                    <h2 class="display-6 fw-bold">{{ $users->count() }}</h2>
                </div>
            </div>
        </div>

        <!-- New Users This Week Card -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card shadow-sm border-0 gradient-bg-purple rounded-4 h-100">
                <div class="card-body d-flex flex-column align-items-center text-center text-white">
                    <i class="fas fa-user-plus fs-1 mb-3"></i>
                    <h5 class="fw-bold">New Users This Week</h5>
                    <h2 class="display-6 fw-bold">{{ $newUsersThisWeek }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Global Styles */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f6fa;
        color: #333;
    }

    /* Card Gradients */
    .gradient-bg-blue {
        background: linear-gradient(135deg, #1d3557, #457b9d);
    }

    .gradient-bg-green {
        background: linear-gradient(135deg, #2a9d8f, #38b000);
    }

    .gradient-bg-orange {
        background: linear-gradient(135deg, #ec8e41, #ca3712);
    }

    .gradient-bg-purple {
        background: linear-gradient(135deg, #6a1b9a, #8e24aa);
    }

    /* Card Styling */
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 1.5rem;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
    }

    /* Typography Adjustments */
    .card h5 {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
    }

    .card h2 {
        font-size: 2rem;
    }

    /* Spacing for Responsive */
    @media (max-width: 768px) {
        h1 {
            font-size: 1.8rem;
        }

        .card h2 {
            font-size: 1.8rem;
        }

        .card h5 {
            font-size: 1rem;
        }
    }
</style>
@endsection