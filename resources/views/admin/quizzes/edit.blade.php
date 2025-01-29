@extends('admin.layout.master')
@section('title', 'Edit Quiz')

@section('content')
<div class="container">
    <!-- Card for Editing Quiz -->
    <div class="card shadow-lg rounded-4 border-0">
        <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
            <h5 class="fw-bold text-uppercase mb-0">
                Edit <span class="text-warning">Quiz</span>
            </h5>
        </div>
        <div class="card-body px-5 py-4">
            <!-- Form for Editing Quiz -->

            <form action="{{ route('admin.quizzes.update', $quiz->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Quiz Title Input -->
                <div class="form-group mb-4">
                    <label for="title" class="form-label fw-bold" style="font-size: 1rem;">Quiz Title</label>
                    <input type="text" name="title" id="title" class="form-control shadow-sm" value="{{ $quiz->title }}"
                        required placeholder="Enter the quiz title" style="font-size: 0.95rem;">
                </div>
                <!-- Quiz Description Input -->
                <div class="form-group mb-4">
                    <label for="description" class="form-label fw-bold" style="font-size: 1rem;">Description</label>
                    <textarea name="description" id="description" class="form-control shadow-sm" rows="4"
                        placeholder="Provide a brief description of the quiz"
                        style="font-size: 0.95rem;">{{ $quiz->description }}</textarea>
                </div>
                <!-- Button Group -->
                <div class="d-flex justify-content-end gap-3 flex-wrap">
                    <!-- Back Button -->
                    <a href="{{ route('admin.quizzes.index') }}"
                        class="btn btn-outline-dark px-3 py-2 rounded-pill btn-responsive">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                    <!-- Update Button -->
                    <button type="submit" class="btn btn-primary shadow-lg px-4 py-2 rounded-pill btn-responsive">
                        <i class="fas fa-edit"></i> Update Quiz
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    /* Global Font */
    body {
        font-family: 'Poppins', sans-serif;
    }

    /* Card Header */
    .card-header h5 {
        font-size: 1.3rem;
    }

    /* Form Group Labels */
    .form-group label {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    /* Input Fields */
    .form-control {
        font-size: 0.95rem;
        padding: 0.8rem;
        border-radius: 8px;
        border: 1px solid #ccc;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }

    /* Buttons */
    .btn {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
    }

    /* Icons */
    .btn i {
        margin-right: 5px;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-header h5 {
            font-size: 1.3rem;
        }

        .form-group label {
            font-size: 0.9rem;
        }

        .form-control {
            font-size: 0.9rem;
        }

        .btn {
            font-size: 0.9rem;
            padding: 0.6rem 1.2rem;
        }

        /* Responsive Buttons */
        .btn-responsive {
            font-size: 0.8rem;
            padding: 0.5rem 1rem;
        }
    }
</style>
@endsection