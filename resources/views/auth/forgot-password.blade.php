<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Reset body and html */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            font-family: 'Roboto', sans-serif;
        }

        /* Gradient Background for Forgot Password Page */
        .forgot-password-section {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #283c86, #45a247);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Forgot Password Form Styling */
        .forgot-password-form {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 380px;
            text-align: center;
        }

        .forgot-password-form h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: white;
            text-transform: uppercase;
            background: linear-gradient(90deg, #f3ec78, #af4261);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 600;
        }

        .forgot-password-form .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 15px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .forgot-password-form .form-control:focus {
            border-color: #f3ec78;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        }

        /* Button Styling */
        .forgot-password-form button {
            background: linear-gradient(90deg, #ff6f61, #ff9478);
            color: white;
            padding: 10px 25px;
            border-radius: 30px;
            border: none;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
            box-shadow: 0 5px 15px rgba(255, 111, 97, 0.4);
        }

        .forgot-password-form button:hover {
            background: linear-gradient(90deg, #ff9478, #ff6f61);
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(255, 111, 97, 0.6);
        }

        /* Text Styling */
        .forgot-password-form .text-sm {
            color: white;
            margin-bottom: 20px;
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Link Styling */
        .forgot-password-form .underline-link {
            font-size: 0.9rem;
            color: white;
            text-decoration: none;
            display: block;
            margin-top: 20px;
        }

        .forgot-password-form .underline-link:hover {
            color: #f3ec78;
        }

        /* Bubble Animation */
        .bubble {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            animation: bubbleAnimation 15s infinite;
        }

        .bubble:nth-child(1) {
            width: 120px;
            height: 120px;
            left: 10%;
            background-color: rgba(255, 183, 77, 0.3);
            animation-duration: 16s;
        }

        .bubble:nth-child(2) {
            width: 90px;
            height: 90px;
            left: 50%;
            background-color: rgba(109, 213, 237, 0.3);
            animation-duration: 18s;
        }

        .bubble:nth-child(3) {
            width: 150px;
            height: 150px;
            right: 15%;
            background-color: rgba(172, 78, 233, 0.3);
            animation-duration: 17s;
        }

        @keyframes bubbleAnimation {
            0% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-500px) scale(1.2);
            }

            100% {
                transform: translateY(0) scale(1);
            }
        }
    </style>
</head>

<body>

    <!-- Bubble Animation -->
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>

    <div class="forgot-password-section">
        <div class="forgot-password-form">
            <h2>Forgot Password?</h2>

            <!-- Information Text -->
            <div class="mb-4 text-sm text-white">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Forgot Password Form -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Reset Button -->
                <button type="submit" class="btn w-100 mt-4">Email Password Reset Link</button>
            </form>

            <!-- Back to Login Link -->
            <a href="{{ route('login') }}" class="underline-link">Back to Login</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
