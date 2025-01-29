@extends('user.layout.master')

@section('title', 'Quiz Results')

@section('content')
<div class="container mt-5">
    <!-- Quiz Results Card -->
    <div class="card shadow-lg border-0 rounded" style="background-color: #f8f9fa;">
        <div class="card-body">
            <!-- Header Section: Title and Score -->
            <div class="row align-items-center mb-5">
                <!-- Quiz Title -->
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <h1 class="fw-bold" style="color: #016992;">Quiz Results</h1>
                    <h3 class="text-primary">Subject: {{ $quiz->title }}</h3>
                </div>

                <!-- Score Section -->
                <div class="col-md-6 text-center text-md-end">
                    <a id="scoreButton" class="btn btn-lg px-5 py-3 fw-bold gradient-btn-standard text-white"
                        style="border-radius: 12px; font-size: 18px; transition: all 0.3s ease; display: inline-block;">
                        Your score: {{ $score }} / {{ count($quiz->questions) }}
                    </a>
                </div>



                <!-- Congratulatory Message Popup -->
                <div id="congratulationPopup"
                    class="d-none position-fixed top-50 start-50 translate-middle text-center p-4 rounded shadow-lg"
                    style="z-index: 1050; width: 80%; max-width: 400px; background: linear-gradient(135deg, #00d2ff, #3a7bd5); color: #fff;">
                    <div>
                        <i class="bi bi-stars fs-1 mb-3"></i> <!-- Modern Icon -->
                        <h2 class="fw-bold mb-3">🎉 Congratulations! 🎉</h2>
                        <p class="fs-5 mb-0">You've achieved perfection with all correct answers!</p>
                    </div>
                </div>
            </div>
            <hr class="modern-hr">

            <!-- Correct Answers Section -->
            <h5 class="text-dark">Answer Breakdown:</h5>
            <ul class="list-group list-group-flush">
                @foreach ($results as $questionId => $result)
                    <li class="list-group-item d-flex align-items-center mb-3 shadow-sm p-3 rounded"
                        style="background-color: #f8f9fa;">
                        <div class="w-75">
                            <strong>{{ $result['question'] }}</strong>
                        </div>
                        <div class="w-25 text-end">
                            <!-- Correct Answer Section with Icons -->
                            @if ($result['user_answer'] == $result['correct_answer'])
                                <!-- Correct Answer (Green Check Icon) -->
                                <span class="badge bg-success" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Correct Answer">
                                    <i class="bi bi-check-circle-fill"></i> Correct:
                                    <strong>{{ $result['correct_answer'] }}</strong>
                                </span>
                                <span class="badge bg-success ms-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Your Answer">
                                    <i class="bi bi-check-circle-fill"></i> Your Ans:
                                    <strong>{{ $result['user_answer'] }}</strong>
                                </span>
                            @else
                                <!-- Incorrect Answer (Red Cross Icon) -->
                                <span class="badge bg-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Correct Answer">
                                    <i class="bi bi-x-circle-fill"></i> Correct:
                                    <strong>{{ $result['correct_answer'] }}</strong>
                                </span>
                                <span class="badge bg-warning ms-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Your Answer">
                                    <i class="bi bi-x-circle-fill"></i> Your Ans:
                                    <strong>{{ $result['user_answer'] }}</strong>
                                </span>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>

            <!-- Back Button Section -->
            <div class="text-center mt-5">
                <a href="{{ route('user.dashboard') }}"
                    class="btn btn-md px-4 py-2 fw-bold gradient-btn-modern text-white shadow-lg"
                    style="border-radius: 50px; font-size: 18px; transition: all 0.3s ease;">
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<style>
  /* Standard Gradient Button Styling */
.gradient-btn-standard,
.gradient-btn-modern {
  border: none;
  letter-spacing: 0.5px;
  transition: all 0.3s ease-in-out;
}

.gradient-btn-standard {
  background: linear-gradient(135deg, #0061f2, #00d8ff); /* Blue to Cyan gradient */
}

.gradient-btn-standard:hover {
  background: linear-gradient(135deg, #00d8ff, #0061f2); /* Reverse the gradient on hover */
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
}

.gradient-btn-modern {
  background-image: linear-gradient(67.2deg, rgba(37, 208, 199, 1) -7.5%, rgba(165, 90, 240, 1) 62.7%);
}

.gradient-btn-modern:hover {
  background-image: linear-gradient(109.6deg, rgba(9, 9, 121, 1) 11.2%, rgba(144, 6, 161, 1) 53.7%, rgba(0, 212, 255, 1) 100.2%);
  transform: translateY(-3px);
  box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Modern hover shadow */
}

.gradient-btn-modern:active,
.gradient-btn-standard:active {
  transform: translateY(1px);
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Hover effect for buttons */
.btn-primary:hover {
  background-color: #0056b3;
  transform: scale(1.05);
}

/* Styling for List Items */
.list-group-item {
  transition: transform 0.2s ease, box-shadow 0.3s ease;
}

.list-group-item:hover {
  transform: translateX(5px);
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Correct and Incorrect Answer Icons */
.bi-check-circle-fill {
  color: #28a745; /* Green for Correct Answer */
}

.bi-x-circle-fill {
  color: #dc3545; /* Red for Incorrect Answer */
}

/* Styling for Background of Score Section */
.card-body {
  background-color: #f1f5f9;
}

/* Styling for Header Section */
.card-body h1 {
  font-size: 2rem;
  font-weight: 700;
}

.card-body h3 {
  font-size: 1.5rem;
}

/* Badge Colors for Correct and Incorrect Answers */
.badge.bg-success {
  background-color: #28a745;
}

.badge.bg-warning {
  background-color: #ffc107;
}

.badge.bg-danger {
  background-color: #dc3545;
}

/* Modern Gradient Button */
@media (max-width: 768px) {
  .gradient-btn-standard,
  .gradient-btn-modern {
    font-size: 16px;
    padding: 10px 20px;
  }

  .text-center {
    text-align: center !important;
  }

  .btn-lg {
    font-size: 16px;
    padding: 10px 25px;
  }

  #congratulationPopup {
    width: 90%;
  }
}

/* Animations and Smooth Transitions */
.container {
  animation: fadeIn 1s ease-in-out;
}

h1,
h3 {
  animation: fadeUp 1s ease-out;
}

ul li {
  animation: slideIn 0.5s ease-in-out;
}

/* Fade In Effect */
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

/* Fade Up Effect */
@keyframes fadeUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Slide In Effect for List Items */
@keyframes slideIn {
  from {
    opacity: 0;
    transform: translateX(-20px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

/* Congress Message */
#congratulationPopup {
  opacity: 0;
  transform: scale(0.9);
  transition: all 0.5s ease-in-out;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

#congratulationPopup:not(.d-none) {
  opacity: 1;
  transform: scale(1);
}

#congratulationPopup h2 {
  font-size: 1.8rem;
}

#congratulationPopup p {
  font-size: 1.2rem;
}

#congratulationPopup i {
  color: #ffe259;
}

</style>

<script>
    // Initialize Bootstrap Tooltip
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });


    //message
    document.addEventListener('DOMContentLoaded', function () {
        const score = {{ $score }};
        const totalQuestions = {{ count($quiz->questions) }};
        const popup = document.getElementById('congratulationPopup');

        // Show the popup if all answers are correct
        if (score === totalQuestions) {
            // Display the congratulatory message
            popup.classList.remove('d-none');

            // Add animation delay for smooth entry
            setTimeout(() => {
                popup.style.opacity = '1';
                popup.style.transform = 'scale(1)';
            }, 100);

            // Hide it automatically after 3 seconds
            setTimeout(() => {
                popup.style.opacity = '0';
                popup.style.transform = 'scale(0.9)';

                // Add a delay before fully hiding the element
                setTimeout(() => popup.classList.add('d-none'), 500);
            }, 3000);
        } else {
            // Ensure the popup remains hidden if the score is not perfect
            popup.classList.add('d-none');
        }
    });
</script>
@endsection