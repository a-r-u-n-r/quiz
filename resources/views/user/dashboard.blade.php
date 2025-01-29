@extends('user.layout.master')
@section('title', 'Dashboard')
@section('content')
<!-- Main Content Section -->
<div class="main-content">
  <div class="row">

    <!-- Available Quizzes and Achievements -->
    <div class="row mb-4 p-0 m-0">
      <!-- Available Quizzes Section -->
      <div class="col-md-6 mb-3 mb-md-0 fade-in">
        <div class="card modern-card shadow-sm">
          <div class="modern-card-header">
            Available Quizzes
          </div>
          <div class="card-body">
            @if($quizzes->isNotEmpty())
        <ul class="list-group list-group-flush">
          @foreach ($quizzes as $quiz)
        <li class="list-group-item modern-list-item d-flex justify-content-between align-items-center">
        <div>
        <h6 class="fw-bold mb-1">{{ $quiz->title }}</h6>
        <p class="small text-muted mb-0">{{ Str::limit($quiz->description, 60) }}</p>
        </div>
        <a href="{{ route('user.quiz.start', $quiz->id) }}" class="btn modern-btn rounded-pill">
        Start Quiz
        <i class="fas fa-arrow-right ms-1"></i>
        </a>
        </li>
      @endforeach
        </ul>
      @else
    <div class="text-center text-muted">
      <p class="mb-0">No quizzes available at the moment.</p>
    </div>
  @endif
          </div>
        </div>
      </div>

      <!-- Achievements Section -->
      <div class="col-md-6 fade-in">
        <div class="card modern-achievement-card shadow-sm">
          <div class="modern-achievement-header">
            Achievements
          </div>
          <div class="card-body">
            @if($achievements->isNotEmpty())
        <ul class="list-group list-group-flush">
          @foreach ($achievements as $achievement)
        <li class="list-group-item modern-achievement-item">
        <h4 class="achievement-title">{{ $achievement->title }}</h4>
        <p class="achievement-description">{{ $achievement->description }}</p>
        </li>
      @endforeach
        </ul>
      @else
    <div class="text-center text-muted">
      <p class="mb-0">No achievements to display at the moment.</p>
    </div>
  @endif
          </div>
        </div>
      </div>
    </div>
    <hr class="modern-hr">

    <!-- Stats Section -->
    <div class="row mb-4 p-0 m-0">
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card stats-card bg-info-gradient text-center">
          <div class="card-body">
            <h6 class="stats-title">Total Quizzes</h6>
            <h3 class="stats-number">{{ $totalQuizzes }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card stats-card bg-success-gradient text-center">
          <div class="card-body">
            <h6 class="stats-title">Completed Quizzes</h6>
            <h3 class="stats-number">{{ $completedQuizzes }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card stats-card bg-warning-gradient text-center">
          <div class="card-body">
            <h6 class="stats-title">Top Score</h6>
            <h3 class="stats-number">{{ $topScore }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card stats-card bg-dark-gradient text-center">
          <div class="card-body">
            <h6 class="stats-title">Average Score</h6>
            <h3 class="stats-number">{{ $averageScore }}</h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Leaderboard Section -->
    <div class="row mb-4 p-0 m-0">
      <div class="col-12">
        <div class="card leaderboard-card shadow-sm border-0">
          <div class="card-header leaderboard-header">
            <h5 class="mb-0">
              <i class="fas fa-trophy leaderboard-icon me-2"></i> Leaderboard
            </h5>
            <button class="btn btn-sm leaderboard-button ms-auto" data-bs-toggle="modal"
              data-bs-target="#leaderboardModal">
              View Leaderboard <i class="fas fa-chevron-right ms-1"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Recommended Quizzes Section -->
    <div class="container recommended-quizzes">
      <div class="card shadow-lg rounded-lg border-0">
        <div class="card-header recommended-quizzes-card-header bg-gradient text-white bg-primary align-items-center">
          <h5 class="text-center"><i class="fas fa-star text-warning me-2"></i> Recommended Quizzes</h5>
        </div>
        <div class="card-body">
          @if($recommendedQuizzes->isEmpty())
        <p class="no-quizzes-msg text-center text-muted">No quizzes available to recommend. You've completed all
        quizzes!</p>
      @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach($recommendedQuizzes as $quiz)
        <div class="col">
          <div class="card recommended-quiz-card h-100 border-0" style="background: linear-gradient(135deg, 
        {{ \Arr::random(['#ff4b5c', '#00bcd4', '#ff9800', '#8e44ad']) }},
        {{ \Arr::random(['#ff6464', '#00796b', '#ff8a65', '#f1c40f']) }});">
          <div class="card-body recommended-quiz-card-body text-center p-4">
          <h5 class="card-title recommended-quiz-card-title text-white"
          style="font-size: 1.4rem; font-weight: 300;">{{ $quiz->title }}</h5>
          <p class="card-text recommended-quiz-card-text text-light" style="font-size: 1rem; opacity: 0.9;">
          {{ Str::limit($quiz->description, 100, '...') }}
          </p>
          <a href="{{ route('user.quiz.start', $quiz->id) }}" class="btn start-quiz-btn btn-lg px-4 py-2 mt-3"
          style="border-radius: 30px; background: #ffffff; color: rgb(0, 0, 0); transition: all 0.3s ease;">
          Start Quiz
          </a>
          </div>
          </div>
        </div>
    @endforeach
        </div>
    @endif
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="leaderboardModal" tabindex="-1" aria-labelledby="leaderboardModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content rounded-4 shadow">
      <!-- Modal Header -->
      <div class="modal-header text-white" style="background: linear-gradient(135deg, #4e54c8, #8f94fb);">
        <h5 class="modal-title d-flex align-items-center" id="leaderboardModalLabel">
          <i class="fas fa-trophy me-3" style="font-size: 1.8rem; color: #ffc107;"></i> Leaderboard
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

     <!-- Modal Body -->
      <div class="modal-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center shadow-sm rounded">
                <!-- Table Head -->
                <thead class="text-white" style="background: linear-gradient(135deg, #1e3c72, #2a5298);">
                    <tr>
                        <th class="py-3">Rank</th>
                        <th class="py-3">User</th>
                        <th class="py-3">Quiz</th>
                        <th class="py-3">Score</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody>
                    @forelse ($leaderboard as $rank => $result)
                        <tr class="align-middle">
                            <!-- Rank with Marking System -->
                            <td>
                                @if ($rank == 0)
                                    <span class="badge rounded-pill" style="background: linear-gradient(45deg, #ffd700, #ffae42); color: #fff;">🥇 1st</span>
                                @elseif ($rank == 1)
                                    <span class="badge rounded-pill" style="background: linear-gradient(45deg, #c0c0c0, #d6d6d6); color: #000;">🥈 2nd</span>
                                @elseif ($rank == 2)
                                    <span class="badge rounded-pill" style="background: linear-gradient(45deg, #cd7f32, #e68a57); color: #fff;">🥉 3rd</span>
                                @else
                                    <span class="text-secondary fw-semibold">{{ $rank + 1 }}</span>
                                @endif
                            </td>
                            <!-- User -->
                            <td class="fw-bold text-dark">{{ $result->user->name }}</td>
                            <!-- Quiz -->
                            <td class="text-muted">{{ $result->quiz->title }}</td>
                            <!-- Score -->
                            <td>
                                <span class="badge rounded-pill" style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff;">
                                    {{ $result->score }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted fw-bold py-4">
                                <i class="fas fa-info-circle me-2"></i> No leaderboard data available.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<style>
  tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.1);
    /* Light blue */
    transition: background-color 0.3s ease;
  }

  /* Table Header Gradient */
  thead th {
    font-size: 1rem;
    font-weight: bold;
    text-transform: uppercase;
  }

  /* Top-3 Badge Styling */
  .badge {
    font-size: 0.9rem;
    font-weight: 600;
    padding: 0.5rem 0.75rem;
  }

  /* Hover Effect for Rows */
  tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.05);
    /* Light blue hover */
    cursor: pointer;
  }

  /* Modal Header Icon */
  .modal-title i {
    font-size: 1.5rem;
    color: #ffc107;
    /* Gold Icon for Trophy */
  }

  /* Smooth Transitions */
  .modal-content,
  table tbody tr {
    transition: all 0.3s ease;
  }
</style>