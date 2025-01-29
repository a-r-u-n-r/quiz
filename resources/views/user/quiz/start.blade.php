@extends('user.layout.master')
@section('title', 'Start Quiz')

@section('content')
<div class="container mt-4">
    <!-- Sticky Timer -->
    <div class="position-fixed bottom-0 end-0 m-3" style="z-index: 1030;">
        <button class="btn btn-danger px-3 py-2 rounded-pill">
            Time-left: <span id="time-left" class="fw-bold">--:--</span>
        </button>
    </div>

    <!-- Quiz Card -->
    <div class="card shadow-lg border-0" style="background: #fefefe; border-radius: 15px;">
        <div class="card-body p-3">
            <!-- Title and Description -->
            <div class="text-center mb-4">
                <h1 class="fw-bold" style="color: #016992;">{{ $quiz->title }}</h1>
                <p class="text-secondary" style="font-size: 18px;">{{ $quiz->description }}</p>
            </div>
            <hr class="modern-hr">

            <!-- Quiz Form -->
            <form action="{{ route('user.quiz.submit', $quiz->id) }}" method="POST" id="quiz-form">
                @csrf
                <div id="quiz-questions">
                    @foreach ($quiz->questions as $question)
                        <div class="mb-4 p-4" style="background: #f8f9fa; border-radius: 10px;">
                            <h5 class="fw-semibold" style="color: #970047;">{{ $question->question_text }}</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question[{{ $question->id }}]" value="A"
                                    id="question{{ $question->id }}A">
                                <label class="form-check-label text-dark"
                                    for="question{{ $question->id }}A">{{ $question->option_a }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question[{{ $question->id }}]" value="B"
                                    id="question{{ $question->id }}B">
                                <label class="form-check-label text-dark"
                                    for="question{{ $question->id }}B">{{ $question->option_b }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question[{{ $question->id }}]" value="C"
                                    id="question{{ $question->id }}C">
                                <label class="form-check-label text-dark"
                                    for="question{{ $question->id }}C">{{ $question->option_c }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question[{{ $question->id }}]" value="D"
                                    id="question{{ $question->id }}D">
                                <label class="form-check-label text-dark"
                                    for="question{{ $question->id }}D">{{ $question->option_d }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success px-5 py-2 fw-normal"
                        style="background-color: #9001bb; border: none; color: white; font-size: 18px; border-radius: 10px;">
                        Submit Quiz
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    /* Hide the default radio button */
    .form-check-input {
        display: none;
    }

    /* Custom radio button style */
    .form-check-label {
        position: relative;
        padding-left: 30px;
        /* Space for the custom radio button */
        cursor: pointer;
        font-size: 16px;
    }

    /* Custom radio circle */
    .form-check-label::before {
        content: '';
        position: absolute;
        left: 5px;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        border: 2px solid #34495e;
        border-radius: 50%;
        background-color: #fff;
        transition: background-color 0.3s, border-color 0.3s;
    }

    /* Checked radio button */
    .form-check-input:checked+.form-check-label::before {
        background-color: #2ecc71;
        border-color: #2ecc71;
    }

    /* Custom check mark (tick) */
    .form-check-input:checked+.form-check-label::after {
        content: '✔';
        position: absolute;
        left: 8px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        color: white;
    }
</style>

<script>
    const quizDuration = 1200; // 20 minutes in seconds
    const quizId = "{{ $quiz->id }}"; // Unique quiz ID
    const userId = "{{ auth()->id() }}"; // Unique user ID
    const timerKey = `quiz_timer_${quizId}_${userId}`; // Unique key for this user's quiz
    const submittedKey = `quiz_submitted_${quizId}_${userId}`; // Unique key for submission
    const timerElement = document.getElementById("time-left");
    const form = document.getElementById("quiz-form");

    // Get current timestamp in seconds
    const getCurrentTimestamp = () => Math.floor(Date.now() / 1000);

    // Initialize or continue the timer
    const initializeTimer = () => {
        let endTime = localStorage.getItem(timerKey);
        const isSubmitted = localStorage.getItem(submittedKey);

        // If quiz is already submitted, disable timer
        if (isSubmitted) {
            timerElement.textContent = "Quiz submitted";
            return;
        }

        if (!endTime) {
            // If no timer exists, start a new timer
            endTime = getCurrentTimestamp() + quizDuration;
            localStorage.setItem(timerKey, endTime);
        } else {
            endTime = parseInt(endTime, 10); // Parse saved end time
        }

        // Update the timer display
        const updateTimer = () => {
            const remainingTime = endTime - getCurrentTimestamp();

            if (remainingTime <= 0) {
                // Time is up; auto-submit the quiz
                clearInterval(timerInterval);
                localStorage.removeItem(timerKey);
                form.submit();
            } else {
                // Display remaining time
                const minutes = Math.floor(remainingTime / 60);
                const seconds = remainingTime % 60;
                timerElement.textContent = `${String(minutes).padStart(2, "0")}:${String(seconds).padStart(2, "0")}`;
            }
        };

        const timerInterval = setInterval(updateTimer, 1000);
        updateTimer(); // Update immediately

        // Stop timer on form submission
        form.addEventListener("submit", () => {
            clearInterval(timerInterval);
            localStorage.setItem(submittedKey, true);
            localStorage.removeItem(timerKey); // Remove timer for next quiz
        });
    };

    // Reset timer for a new quiz
    const resetTimer = () => {
        localStorage.removeItem(timerKey);
        localStorage.removeItem(submittedKey);
    };

    document.addEventListener("DOMContentLoaded", () => {
        // Check if this is a new quiz session
        if (!localStorage.getItem(timerKey)) {
            resetTimer();
        }
        initializeTimer();
    });

</script>
@endsection