<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizify - Empowering Minds, One Quiz at a Time</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Reset body and html */
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
        }

        /* Enhanced Gradient Background */
        .hero-section {
            position: relative;
            height: 100vh;
            background-image: linear-gradient( 250deg,  rgba(21,13,107,1) 1.1%, rgb(68, 1, 25) 130.5% );
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
            overflow: hidden;
        }

        .hero-content {
            text-align: center;
            z-index: 1;
        }

        /* Polished Text Styles */
        .hero-content h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            background: linear-gradient(90deg, #f3ec78, #d84770);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: fadeInUp 1.5s ease-out forwards;
        }

        .hero-content p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            opacity: 0;
            animation: fadeIn 2s ease-out forwards;
        }

        /* Buttons with Interactive Hover Effects */
        /* Enhanced Button Animations */
        .hero-content a {
            font-size: 1.2rem;
            font-weight: 600;
            margin: 10px 20px;
            padding: 12px 35px;
            border-radius: 30px;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.4s ease, background 0.3s ease;
            animation: bounceIn 1s ease-out forwards;
        }

        /* Individual Button Animations */
        .hero-content a:nth-child(1) {
            animation-delay: 0.2s;
        }

        .hero-content a:nth-child(2) {
            animation-delay: 0.4s;
        }

        /* Hover Effects */
        .hero-content a:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        /* Bounce In Animation */
        @keyframes bounceIn {
            0% {
                transform: scale(0.7);
                opacity: 0;
            }

            50% {
                transform: scale(1.2);
                opacity: 0.7;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .btn-primary {
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            color: white;
            box-shadow: 0 5px 15px rgba(106, 17, 203, 0.4);
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #2575fc, #6a11cb);
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(106, 17, 203, 0.6);
        }

        .btn-secondary {
            background: linear-gradient(90deg, #ff416c, #ff4b2b);
            color: white;
            box-shadow: 0 5px 15px rgba(255, 65, 108, 0.4);
        }

        .btn-secondary:hover {
            background: linear-gradient(90deg, #ff4b2b, #ff416c);
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(255, 65, 108, 0.6);
        }

        /* Responsive Buttons */
        .btn-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        @media (min-width: 768px) {
            .btn-container {
                flex-direction: row;
            }
        }

        /* Bubbles with New Colors */
        .bubble {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            animation: bubbleAnimation 20s infinite;
        }

        .bubble:nth-child(1) {
            width: 150px;
            height: 150px;
            left: 10%;
            background-color: rgba(255, 183, 77, 0.3);
            animation-duration: 16s;
        }

        .bubble:nth-child(2) {
            width: 100px;
            height: 100px;
            left: 40%;
            background-color: rgba(109, 213, 237, 0.3);
            animation-duration: 18s;
        }

        .bubble:nth-child(3) {
            width: 120px;
            height: 120px;
            left: 70%;
            background-color: rgba(172, 78, 233, 0.3);
            animation-duration: 14s;
        }

        .bubble:nth-child(4) {
            width: 90px;
            height: 90px;
            left: 30%;
            background-color: rgba(255, 105, 180, 0.3);
            animation-duration: 17s;
        }

        .bubble:nth-child(5) {
            width: 130px;
            height: 130px;
            left: 80%;
            background-color: rgba(77, 144, 254, 0.3);
            animation-duration: 20s;
        }

        /* Animation for bubbles */
        @keyframes bubbleAnimation {
            0% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-500px) scale(1.3);
            }

            100% {
                transform: translateY(0) scale(1);
            }
        }

        /* Fade In Animations */
        @keyframes fadeInUp {
            0% {
                transform: translateY(100px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1.1rem;
            }

            .hero-content a {
                font-size: 1rem;
                padding: 10px 25px;
            }
        }
    </style>
</head>

<body>
    <div class="hero-section">
        <!-- Floating Bubbles -->
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble">Quizify</div>

        <!-- Hero Content -->
        <div class="hero-content">
            <h1>Welcome to Quizify</h1>
            <p>Your Ultimate Online Quiz Companion. Empowering minds, one quiz at a time!</p>
            <div class="btn-container">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login Quizify</a>
                <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">Join Quizify</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap and JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>