@extends('admin.layout.master')
@section('title', 'All Quizzes')

@section('content')

<!-- Page Header with Gradient Background -->
<div class="d-flex justify-content-between align-items-center mb-4"
    style="background: linear-gradient(135deg, #6f42c1, #0d2f3f); padding: 25px 40px; border-radius: 12px;">
    <h3 class="text-white font-weight-bold mb-0" style="font-size: 1.3rem; letter-spacing: 1px;">All Quizzes</h3>
    <a href="{{ route('admin.quizzes.create') }}" class="btn btn-warning btn-sm px-4 py-2">
        <i class="fas fa-plus-circle"></i> Add New Quiz
    </a>
</div>

<!-- Quizzes List inside Cards -->
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach ($quizzes as $quiz)
        <div class="col">
            <div class="card shadow-lg rounded-lg border-0" style="background: linear-gradient(135deg, 
                        {{ \Arr::random(['#09122C', '#740938', '#3B1E54', '#16404D', '#B8001F']) }},
                        {{ \Arr::random(['#155E95', '#54473F', '#000B58', '#243642', '#A04747']) }});">
                <div class="card-body p-4">
                    <h5 class="card-title text-white font-weight-bold" style="font-size: 1.6rem; color: #ffffff;">
                        {{ $quiz->title }}
                    </h5>
                    <p class="card-text text-light" style="font-size: 1rem; color: rgba(255, 255, 255, 0.8);">
                        {{ \Str::limit($quiz->description, 120, '...') }}
                    </p>
                    <a href="{{ route('admin.quizzes.questions.index', $quiz->id) }}"
                        class="btn btn-outline-light btn-sm px-4 py-2"
                        style="border-radius: 25px; transition: all 0.3s ease;">View Questions</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{ $quizzes->links('pagination::bootstrap-5') }}
</div>
@endsection

<!-- Custom Styles -->
<style>
    /* Global Styles */
    body {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        background-color: #f8f9fa;
        color: #495057;
    }

    /* Header Section */
    h3 {
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: 1px;
    }

    /* Card Styling */
    .card {
        border-radius: 15px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
        transform: translateY(-7px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #ffffff;
    }

    .card-text {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.8);
    }

    .card-body {
        padding: 1.5rem;
    }

    /* Button Styles */
    .btn-outline-light {
        border-color: #ffffff;
        color: #ffffff;
        transition: all 0.3s ease;
        border-radius: 30px;
    }

    .btn-outline-light:hover {
        background-color: #ffffff;
        color: #007bff;
        border-color: #ffffff;
    }

    .btn-light {
        background-color: #f8f9fa;
        border-color: #f8f9fa;
        color: #007bff;
        transition: all 0.3s ease;
        border-radius: 30px;
    }

    .btn-light:hover {
        background-color: #e2e7f1;
        border-color: #e2e7f1;
        color: #0056b3;
    }

    /* Responsive Styling */
    @media (max-width: 768px) {
        .row-cols-md-2 {
            row-cols-md-1;
        }
    }

    /* Pagination Styling */
    .pagination {
        font-size: 0.9rem;
        color: #495057;
    }

    .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }

    .page-link {
        color: #007bff;
        font-weight: 500;
        border-radius: 30px;
    }

    .page-link:hover {
        background-color: #0056b3;
        color: #fff;
    }
</style>