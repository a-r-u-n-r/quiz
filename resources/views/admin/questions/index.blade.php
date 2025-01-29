@extends('admin.layout.master')
@section('title', 'Manage Questions')

@section('content')
<div class="container">
    <!-- Card for Manage Questions -->
    <div class="card shadow-lg rounded-4 border-0">
        <!-- Page Title -->
        <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
            <h5 class="fw-bold text-uppercase mb-0">
                Manage Questions for <span class="text-warning">"{{ $quiz->title }}"</span>
            </h5>
        </div>

        <div class="card-body px-4 py-5">
            <!-- Add New Question Button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-dark" style="font-size: 1.2rem;">Question List</h4>
                <a href="{{ route('admin.quizzes.questions.create', $quiz->id) }}"
                    class="btn btn-info px-4 py-2 rounded-pill shadow-sm">
                    <i class="fas fa-plus-circle"></i> Add Question
                </a>
            </div>

            <!-- Questions Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle text-left borderless" style="font-size: 1rem;">
                    <thead class="bg-secondary text-white">
                        <tr style="font-size: 1rem;">
                            <th>Sl</th>
                            <th>Question</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i =1 @endphp
                        @foreach ($questions as $question)
                            <tr>
                                {{-- <td>{{ $question->id }}</td> --}}
                                <td>{{ $i++ }}</td>
                                <td>{{ Str::limit($question->question_text, 50) }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2" <!-- Edit Button -->
                                        <a href="{{ route('admin.quizzes.questions.edit', $question->id) }}"
                                            class="btn btn-warning btn-sm shadow-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('admin.quizzes.questions.destroy', $question->id) }}"
                                            method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm shadow-sm"
                                                onclick="return confirm('Are you sure you want to delete this question?')">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Back Button inside Card (Bottom Left) -->
            <a href="{{ route('admin.quizzes.index') }}"
                class="btn btn-outline-dark px-3 py-2 rounded-pill btn-responsive">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    /* Google Font */
    body {
        font-family: 'Poppins', sans-serif;
    }

    /* Table Styling */
    .table {
        border-collapse: separate;
        border-spacing: 0 0.7rem;
    }

    .table thead th {
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa !important;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
    }

    /* Button Styling */
    .btn {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .table {
            width: 100%;
            font-size: 0.9rem;
        }

        .table th,
        .table td {
            font-size: 0.9rem;
            word-wrap: break-word;
            max-width: 200px;
            white-space: normal;
        }

        .btn {
            font-size: 0.85rem;
            padding: 0.5rem 1.2rem;
        }

        .card-body {
            padding: 2rem;
        }
    }

    /* Small Screen Adjustments */
    @media (max-width: 576px) {

        .table th,
        .table td {
            font-size: 0.8rem;
        }

        .btn {
            font-size: 0.75rem;
            padding: 0.4rem 1rem;
        }
    }
</style>
@endsection