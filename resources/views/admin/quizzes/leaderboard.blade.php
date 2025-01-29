@extends('admin.layout.master')
@section('title', 'Leaderboard')

@section('content')
<!-- Leaderboard Card -->
<div class="card leaderboard-card shadow-lg border-0 rounded-4 overflow-hidden">
    <!-- Card Header -->
    <div class="card-header text-center py-4 bg-gradient-primary text-white rounded-top-4">
        <h1 class="fw-bold mb-0">🏆 Leaderboard</h1>
    </div>

    <!-- Card Body -->
    <div class="card-body p-4 p-md-3">
        <div class="table-responsive">
            <table class="table leaderboard-table text-center align-middle">
                <thead>
                    <tr class="table-header">
                        <th>Rank</th>
                        <th>User</th>
                        <th>Quiz</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizResults as $key => $result)
                        <tr class="table-row">
                            <td class="rank-cell">
                                <span class="rank-circle">#{{ $key + 1 }}</span>
                            </td>
                            <td class="fw-semibold">{{ $result->user->name }}</td>
                            <td class="quiz-title">{{ $result->quiz->title }}</td>
                            <td class="score-badge">{{ $result->score }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination-container mt-5 d-flex justify-content-center">
            <div class="pagination-numbers">
                {{ $quizResults->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    /* Global Variables */
    :root {
        --primary-color: #4a90e2;
        --secondary-color: #50e3c2;
        --accent-color: #ff758c;
        --bg-color: #f4f6f9;
        --card-bg: #ffffff;
        --card-hover-bg: #f9f9f9;
        --text-color: #333;
        --highlight-color: #00f7d4;
        --shadow-color: rgba(0, 0, 0, 0.1);
    }

    /* Global Styles */
    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--bg-color);
        color: var(--text-color);
        margin: 0;
        padding: 0;
    }

    /* Leaderboard Card */
    .leaderboard-card {
        border-radius: 20px;
        background: linear-gradient(135deg, var(--card-bg), var(--bg-color));
        box-shadow: 0 10px 30px var(--shadow-color);
        border: 1px solid var(--shadow-color);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .leaderboard-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px var(--shadow-color);
    }

    .card-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: #fff;
        text-align: center;
        padding: 40px 20px;
        border-radius: 20px 20px 0 0;
        font-size: 2rem;
        font-weight: bold;
    }

    .card-header:hover {
        background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
    }

    /* Table Styling */
    .leaderboard-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border-radius: 12px;
        overflow: hidden;
    }

    .table-header th {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: #fff;
        font-size: 1.2rem;
        padding: 16px;
        font-weight: bold;
        border: none;
        border-radius: 12px 12px 0 0;
    }

    .table-row {
        background: var(--card-bg);
        border-radius: 10px;
        margin-bottom: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .table-row:hover {
        transform: scale(1.03);
        background: var(--card-hover-bg);
        box-shadow: 0 10px 30px var(--shadow-color);
    }

    .rank-cell {
        font-size: 1.2rem;
        color: var(--secondary-color);
    }

    .rank-circle {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: #fff;
        font-size: 1.1rem;
        padding: 8px 18px;
        border-radius: 50%;
        display: inline-block;
        font-weight: bold;
    }

    .quiz-title,
    .score-badge {
        font-size: 1.1rem;
    }

    .score-badge {
        background: linear-gradient(135deg, var(--accent-color), #ff7eb3);
        color: #fff;
        padding: 8px 16px;
        border-radius: 12px;
        font-weight: 700;
    }

    /* Pagination Styling */
    .pagination-container {
        font-size: 1rem;
        margin-top: 20px;
        justify-content: center;
    }

    .pagination-numbers .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: #fff;
        border: none;
        box-shadow: 0 5px 15px rgba(101, 17, 203, 0.3);
        border-radius: 8px;
    }

    .pagination-numbers .pagination .page-link {
        color: var(--secondary-color);
        font-size: 0.95rem;
        font-weight: 600;
        border-radius: 8px;
    }

    .pagination-numbers .pagination .page-link:hover {
        background: var(--primary-color);
        color: #fff;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .card-header h1 {
            font-size: 1.8rem;
        }

        .pagination-container {
            flex-direction: column;
            align-items: flex-start;
        }

        .pagination-text {
            margin-bottom: 10px;
        }
    }

    @media (max-width: 576px) {
        .card-header h1 {
            font-size: 1.5rem;
        }

        .pagination-numbers .pagination .page-link {
            font-size: 0.85rem;
        }
    }
</style>