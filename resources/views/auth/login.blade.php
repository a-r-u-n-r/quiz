<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Reset body and html */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
        }

        /* Gradient Background for Login Page */
        .login-section {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Login Form Styling */
        .login-form {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: left;
        }

        .login-form h2 {
            font-size: 2rem;
            margin-bottom: 30px;
            color: white;
            text-transform: uppercase;
            background: linear-gradient(90deg, #f3ec78, #af4261);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        /* Input fields */
        .login-form .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .login-form .form-control:focus {
            border-color: #f3ec78;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        }

        /* Button Styling */
        .login-form button {
            background: linear-gradient(90deg, #ff6f61, #ff9478);
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            border: none;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
            box-shadow: 0 5px 15px rgba(255, 111, 97, 0.4);
        }

        .login-form button:hover {
            background: linear-gradient(90deg, #ff9478, #ff6f61);
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(255, 111, 97, 0.6);
        }

        /* Forgot Password Link Styling */
        .login-form .forgot-password {
            font-size: 0.9rem;
            color: white;
            text-decoration: none;
            margin-top: 15px;
            display: block;
        }

        .login-form .forgot-password:hover {
            color: #f3ec78;
        }

        /* Remember Me Checkbox */
        .login-form .form-check {
            margin-bottom: 20px;
        }

        /* Bubble Animation */
        .bubble {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.3);
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
    </style>
</head>

<body>

    <!-- Bubble Animation -->
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>

    <div class="login-section">
        <div class="login-form">
            <h2>Login</h2>
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label class="text-white" for="email" :value="__('Email')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label class="text-white" for="password" :value="__('Password')" />
                    <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="form-check mt-4">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label text-white">{{ __('Remember me') }}</label>
                </div>

                <!-- Forgot Password Link -->
                <div class="mt-3">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn w-100 mt-4">Log in</button>
            </form>
            <div class="mt-3">
                <a href="{{ route('register') }}" class="forgot-password text-center">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
