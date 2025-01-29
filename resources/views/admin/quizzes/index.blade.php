@extends('admin.layout.master')
@section('title', 'Manage Quizzes')

@section('content')
<div class="container">
    <!-- Card for Quizzes Management -->
    <div class="card shadow-lg rounded-4 border-0">
        <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
            <h5 class="fw-bold text-uppercase mb-0">
                Manage Your <span class="text-warning">Quizzes</span>
            </h5>
        </div>
        <div class="card-body px-4 py-5">
            <!-- Create New Quiz Button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-dark" style="font-size: 1.2rem;">Quiz List</h4>
                <a href="{{ route('admin.quizzes.create') }}" class="btn btn-warning px-3 py-2 shadow rounded-pill"
                    style="font-size: 0.9rem;">
                    <i class="fas fa-plus-circle"></i> Create New Quiz
                </a>
            </div>

            <!-- Quizzes Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center borderless" style="font-size: 1rem;">
                    <thead class="bg-secondary text-white">
                        <tr class="align-middle" style="font-size: 1rem;">
                            <th class="py-3">ID</th>
                            <th class="py-3">Title</th>
                            <th class="py-3">Description</th>
                            <th class="py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp 
                        @forelse ($quizzes as $quiz)
                            <tr class="bg-light">
                                {{-- <td class="fw-bold">{{ $quiz->id }}</td> --}}
                                <td class="fw-bold">{{ $i++ }}</td>
                                <td class="text-start">{{ Str::limit($quiz->title, 50) }}</td>
                                <td class="text-start">{{ Str::limit($quiz->description, 100) }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <!-- Edit Quiz -->
                                        <a href="{{ route('admin.quizzes.edit', $quiz->id) }}"
                                            class="btn btn-warning btn-sm shadow-sm">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </a>

                                        <!-- Manage Questions -->
                                        <a href="{{ route('admin.quizzes.questions.index', $quiz->id) }}"
                                            class="btn btn-info btn-sm shadow-sm">
                                            <i class="fas fa-question-circle me-1"></i>Questions
                                        </a>

                                        <!-- Delete Quiz -->
                                        <form action="{{ route('admin.quizzes.destroy', $quiz->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm shadow-sm"
                                                onclick="return confirm('Are you sure you want to delete this quiz?')">
                                                <i class="fas fa-trash-alt me-1"></i>Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-muted py-4">
                                    <em>No quizzes available. Create one now!</em>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Back Button -->
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark mt-4">
                <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
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
        .btn {
            font-size: 0.85rem;
        }

        .table th,
        .table td {
            font-size: 0.9rem;
        }
    }
</style>
@endsection