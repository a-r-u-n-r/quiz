@extends('admin.layout.master')
@section('title', 'Edit Question')

@section('content')
<div class="container">
    <!-- Card for Edit Question Form -->
    <div class="card shadow-lg rounded-4 border-0">
        <!-- Page Title -->
        <div class="card-header bg-primary  text-center py-3 rounded-top-4">
            <h5 class="fw-bold text-white text-uppercase mb-0">
                Edit Question
            </h5>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Question Form -->
        <div class="card-body px-4 py-5">
            <form action="{{ route('admin.quizzes.questions.update', $question->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Question Text -->
                <div class="form-group mb-3">
                    <label for="question_text" class="font-weight-bold">Question Text</label>
                    <textarea name="question_text" id="question_text" class="form-control" rows="4"
                        required>{{ old('question_text', $question->question_text) }}</textarea>
                </div>

                <!-- Option A -->
                <div class="form-group mb-3">
                    <label for="option_a" class="font-weight-bold">Option A</label>
                    <input type="text" name="option_a" id="option_a" class="form-control"
                        value="{{ old('option_a', $question->option_a) }}" required>
                </div>

                <!-- Option B -->
                <div class="form-group mb-3">
                    <label for="option_b" class="font-weight-bold">Option B</label>
                    <input type="text" name="option_b" id="option_b" class="form-control"
                        value="{{ old('option_b', $question->option_b) }}" required>
                </div>

                <!-- Option C -->
                <div class="form-group mb-3">
                    <label for="option_c" class="font-weight-bold">Option C</label>
                    <input type="text" name="option_c" id="option_c" class="form-control"
                        value="{{ old('option_c', $question->option_c) }}" required>
                </div>

                <!-- Option D -->
                <div class="form-group mb-3">
                    <label for="option_d" class="font-weight-bold">Option D</label>
                    <input type="text" name="option_d" id="option_d" class="form-control"
                        value="{{ old('option_d', $question->option_d) }}" required>
                </div>

                <!-- Correct Option -->
                <div class="form-group mb-4">
                    <label for="correct_option" class="font-weight-bold">Correct Option</label>
                    <select name="correct_option" id="correct_option" class="form-control" required>
                        <option value="a" {{ old('correct_option', $question->correct_option) == 'a' ? 'selected' : '' }}>
                            A</option>
                        <option value="b" {{ old('correct_option', $question->correct_option) == 'b' ? 'selected' : '' }}>
                            B</option>
                        <option value="c" {{ old('correct_option', $question->correct_option) == 'c' ? 'selected' : '' }}>
                            C</option>
                        <option value="d" {{ old('correct_option', $question->correct_option) == 'd' ? 'selected' : '' }}>
                            D</option>
                    </select>
                </div>

                <!-- Submit Button -->
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
    /* General Form Styling */
    .form-group label,
    .form-control {
        font-size: 1rem;
    }

    .form-control {
        padding: 0.75rem;
        border-radius: 0.5rem;
    }

    /* Card Styling */
    .card {
        border-radius: 1rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card h1 {
        font-size: 1.75rem;
        font-weight: bold;
        color: #333;
    }

    /* Alert Styling */
    .alert {
        border-radius: 0.5rem;
        font-size: 0.9rem;
    }

    /* Back Button */
    .btn-secondary {
        background-color: #6c757d;
        font-size: 0.9rem;
        padding: 0.6rem 1.5rem;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    /* Button Styling */
    .btn-primary {
        background-color: #007bff;
        font-size: 1.1rem;
        padding: 1rem;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    /* Small Screen Adjustments */
    @media (max-width: 768px) {

        .form-group label,
        .form-control {
            font-size: 1rem;
        }

        .btn {
            font-size: 1.1rem;
            padding: 0.8rem 1.5rem;
        }
    }
</style>
@endsection