<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | クイズ・ゲーム </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Add this inside the <head> tag -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto:wght@400;500&display=swap"
    rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      background: linear-gradient(120deg, #f4f7fb, #ffffff);
      font-family: 'Roboto', sans-serif;
    }

    /* Main Content Styles */
    .main-content {
      max-width: 1200px;
      margin: 10px auto;
      padding: 20px;
      background: #f9f9f986;
      /* Muted background color */
      border-radius: 10px;
      border: 1px solid #e0e0e0;
      /* Subtle border */
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.164);
      /* Light shadow for a modern effect */
    }

    /* Header Styles */
    .header {
      background-image: linear-gradient(109.6deg, rgba(9, 9, 121, 1) 11.2%, rgba(144, 6, 161, 1) 53.7%, rgba(0, 212, 255, 1) 100.2%);
      color: #ffffff;
      padding: 15px 30px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .header .project-name {
      font-size: 2rem;
      font-family: Georgia, 'Times New Roman', Times, serif;
      font-weight: 700;
      display: flex;
      align-items: center;
    }

    .header .project-name i {
      margin-right: 6px;
    }

    .header .user-profile {
      position: relative;
      display: flex;
      align-items: center;
    }

    .header .user-profile span {
      font-size: 1rem;
      font-weight: 500;
    }

    .header .dropdown-menu {
      right: 0;
      left: auto;
      border: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    .header .dropdown-item {
      font-size: 0.9rem;
      padding: 10px 15px;
      transition: background-color 0.3s, color 0.3s;
    }

    .header .dropdown-item:hover {
      background-color: #1c3b2a;
      color: #ffffff;
    }

    /* Card styling */
    .modern-card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .modern-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    /* Card header styling */
    .modern-card-header {
      background-image: radial-gradient(circle farthest-corner at 2.9% 7.7%, rgba(164, 14, 176, 1) 0%, rgba(254, 101, 101, 1) 90%);
      color: white;
      border-bottom: none;
      padding: 15px;
      text-align: center;
      font-size: 1.25rem;
      font-weight: bold;
    }

    /* List item styling */
    .modern-list-item {
      border: 1px solid #e0e0e0;
      border-radius: 10px;
      margin-bottom: 10px;
      padding: 15px;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .modern-list-item:hover {
      background: linear-gradient(90deg, #ffdcf3, #faf7d4);
      /* Light Pink to Soft Yellow */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Button styling */
    .modern-btn {
      border: 2px solid #6a11cb;
      color: #6a11cb;
      transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
    }

    .modern-btn:hover {
      background-color: #6a11cb;
      color: white;
      box-shadow: 0 4px 10px rgba(106, 17, 203, 0.5);
      /* Purple Glow */
    }

    /* Card styling */
    .modern-achievement-card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .modern-achievement-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    /* Card header styling */
    .modern-achievement-header {
      background-image: linear-gradient(109.6deg, rgba(116, 18, 203, 1) 11.2%, rgba(230, 46, 131, 1) 91.2%);
      color: white;
      border-bottom: none;
      padding: 15px;
      text-align: center;
      font-size: 1.25rem;
      font-weight: bold;
    }

    /* List item styling */
    .modern-achievement-item {
      border: 1px solid #e0e0e0;
      border-radius: 10px;
      margin-bottom: 10px;
      padding: 15px;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .modern-achievement-item:hover {
      background: linear-gradient(90deg, #fff4e7, #fac6b4);
      /* Light Peach to Soft Orange */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }


    /* General Card Styling */
    .stats-card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      /* Default Gradient */
      color: white;
    }

    .stats-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    /* Gradient Colors for Each Card */
    .bg-info-gradient {
      background-image: radial-gradient(circle farthest-corner at 32.7% 82.7%, rgba(173, 0, 171, 1) 8.3%, rgba(15, 51, 92, 1) 79.4%);
    }

    .bg-success-gradient {
      background-image: radial-gradient(circle farthest-corner at 10% 20%, rgba(237, 3, 32, 0.87) 20.8%, rgba(242, 121, 1, 0.84) 74.4%);

    }

    .bg-warning-gradient {
      background-image: radial-gradient(circle farthest-corner at 10% 20%, rgba(14, 174, 87, 1) 0%, rgba(12, 116, 117, 1) 90%);
    }

    .bg-dark-gradient {
      background-image: radial-gradient(circle farthest-corner at 10% 20%, rgba(249, 57, 170, 1) 9.8%, rgb(21, 80, 190) 94.9%);
    }

    /* Typography Styling */
    .stats-title {
      font-weight: bold;
      font-size: 1.1rem;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .stats-number {
      font-size: 3rem;
      font-weight: 900;
    }

    /* Achievement title styling */
    .achievement-title {
      font-size: 1rem;
      font-weight: bold;
      color: #f54519;
    }

    /* Achievement description styling */
    .achievement-description {
      font-size: 0.9rem;
      color: #000155;
      margin: 0px;
      padding: 0px;
    }

    /* General Card Styling for Leaderboard */
    .leaderboard-card {
      border: none;
      border-radius: 15px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background: linear-gradient(135deg, #ff7e5f, #feb47b);
      /* Smooth Gradient with Peach and Orange */
      color: white;
    }

    .leaderboard-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
    }

    /* Card Header Styling */
    .leaderboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background-image: linear-gradient(65.9deg, rgba(85, 228, 224, 1) 5.5%, rgba(75, 68, 224, 0.74) 54.2%, rgba(64, 198, 238, 1) 55.2%, rgba(177, 36, 224, 1) 98.4%);
      color: #1c3e7e !important;
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      border-radius: 15px 15px 0 0;
    }

    .leaderboard-header h5 {
      font-weight: bold;
      margin-bottom: 0;
    }

    .leaderboard-header button {
      transition: background-color 0.3s ease, transform 0.2s ease;
      border-radius: 20px;
      border: 2px solid #feb47b;
      background-color: transparent;
      color: #fff;
    }

    .leaderboard-header button:hover {
      background-color: #feb47b;
      /* Button hover background */
      color: #1e3c72;
      /* Text color on hover */
      transform: scale(1.1);
      border-color: #feb47b;
    }

    /* Icon and Text Styling */
    .leaderboard-icon {
      color: #f700c1;
    }

    /* Modal Button Styling */
    .leaderboard-button {
      background-color: #2575fc;
      border-color: #2575fc;
      color: white;
      padding: 8px 20px;
      font-size: 14px;
      border-radius: 30px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .leaderboard-button:hover {
      background-color: #6a11cb;
      border-color: #6a11cb;
      transform: scale(1.05);
    }


    /* General Styling for the Recommended Quizzes Section */
    .recommended-quizzes-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      background-color: #ffffff;
      overflow: hidden;
    }

    .recommended-quizzes-card-header {
      background: linear-gradient(135deg, #1f4d79, #2575fc);
      /* Gradient for header */
      color: white;
      padding: 10px;
      text-align: center;
      font-size: 1.3rem;
      font-weight: 500;
      text-transform: uppercase;
    }

    /* Styling for the Quiz Cards in the Body */
    .recommended-quiz-card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background: linear-gradient(135deg, #ff7e5f, #feb47b);
      /* Modern gradient color */
      color: white;
      height: 250px;
      /* Slightly smaller card height */
    }

    .recommended-quiz-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    }

    .recommended-quiz-card-body {
      padding: 20px;
      font-size: 1rem;
      height: 180px;
      /* Adjusted for smaller card size */
      overflow: hidden;
    }

    .recommended-quiz-card-title {
      font-weight: 600;
      color: #011017;
      margin-bottom: 10px;
    }

    .recommended-quiz-card-text {
      color: #dcdcdc;
      font-size: 0.9rem;
      margin-bottom: 20px;
    }

    /* Styling for the 'Start Quiz' Button */
    .start-quiz-btn {
      background-color: #ff7e5f;
      color: white;
      padding: 12px 20px;
      font-size: 14px;
      border-radius: 30px;
      text-transform: uppercase;
      transition: background-color 0.3s ease, transform 0.3s ease;
      width: 100%;
    }

    .start-quiz-btn:hover {
      background-color: #feb47b;
      transform: scale(1.05);
    }

    /* Empty Message Styling */
    .no-quizzes-msg {
      color: #6c757d;
      font-size: 1rem;
      text-align: center;
      padding: 20px;
    }

    /* Container Styling */
    .recommended-quizzes-container {
      margin-top: 50px;
    }


    /* Animations */
    @keyframes fadeInLeft {
      0% {
        opacity: 0;
        transform: translateX(-20px);
      }

      100% {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes glow {

      0%,
      100% {
        box-shadow: 0 0 8px #00f7d4;
      }

      50% {
        box-shadow: 0 0 20px #00f7d4;
      }
    }

    .modern-hr {
      border: none;
      height: 2px;
      background-image: linear-gradient(109.6deg, rgba(9, 9, 121, 1) 11.2%, rgba(144, 6, 161, 1) 53.7%, rgba(0, 212, 255, 1) 100.2%);
      border-radius: 5px;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
      margin: 15px auto;
      width: 80%;
    }

    /* Footer Styling */
    .footer {
      position: relative;
      overflow: hidden;
    }

    .text-gradient {
      background-image: linear-gradient(184.1deg, rgba(249, 255, 182, 1) 44.7%, rgba(226, 255, 172, 1) 67.2%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .social-icon:hover {
      transform: scale(1.2);
      animation: glow 1.5s infinite alternate;
    }

    .developer-info {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      text-align: center;
      background: rgba(0, 31, 43, 0.8);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      border-radius: 15px;
      font-family: "Inconsolata", serif;
    }

    .developer-info p:hover,
    .developer-info h5:hover {
      color: #ff7e5f;
      transform: scale(1.05);
      transition: transform 0.3s ease, color 0.3s ease;
    }

    .developer-info h5 {
      font-size: 1.2rem;
      font-weight: 700;
      color: #fff;
    }

    .developer-info p {
      font-size: 1rem;
      color: #fff;
      font-weight: 500;
    }

    .developer-info i {
      color: #feb47b;
    }

    /* Responsive Styling */
    @media (max-width: 768px) {
      .footer .developer-info {
        margin-top: 20px;
      }

      .footer .social-icon {
        margin: 0 10px;
      }

      .developer-info h5 {
        font-size: 1rem;
      }

      .developer-info p {
        font-size: 0.9rem;
      }
    }

    /* Animated Background Shapes */
    .shape,
    .shape2 {
      position: absolute;
      width: 100px;
      height: 100px;

      opacity: 0.2;
      border-radius: 50%;
      animation: float 6s ease-in-out infinite;
    }

    .shape {
      top: -30px;
      left: -50px;
      background: #74ff52;
      animation-delay: 0s;
    }

    .shape2 {
      bottom: -40px;
      right: -40px;
      background: #ffee03;
      animation-delay: 2s;
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(-10px);
      }

      50% {
        transform: translateY(10px);
      }
    }
  </style>
</head>

<body>

  @include('user.components.header')

  @yield('content')
  <!-- Footer Section -->
  @include('user.components.footer')

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>