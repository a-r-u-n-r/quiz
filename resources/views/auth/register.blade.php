<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        /* Gradient Background for Register Page */
        .register-section {
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

        /* Register Form Styling */
        .register-form {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 380px;
            text-align: left;
        }

        .register-form h2 {
            font-size: 1.6rem;
            margin-bottom: 25px;
            color: white;
            text-transform: uppercase;
            background: linear-gradient(90deg, #f3ec78, #af4261);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 600;
        }

        /* Input fields */
        .register-form .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 15px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .register-form .form-control:focus {
            border-color: #f3ec78;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        }

        /* Button Styling */
        .register-form button {
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

        .register-form button:hover {
            background: linear-gradient(90deg, #ff9478, #ff6f61);
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(255, 111, 97, 0.6);
        }

        /* Remember Me Checkbox */
        .register-form .form-check {
            margin-bottom: 20px;
        }

        /* Forgot Password Link Styling */
        .register-form .forgot-password {
            font-size: 0.85rem;
            color: white;
            text-decoration: none;
            margin-top: 15px;
            display: block;
        }

        .register-form .forgot-password:hover {
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

        /* Animation for bubbles */
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

    <div class="register-section">
        <div class="register-form">
            <h2>Register</h2>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label class="text-white" for="name" :value="__('Name')" />
                    <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label class="text-white" for="email" :value="__('Email')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label class="text-white" for="password" :value="__('Password')" />
                    <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label class="text-white" for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                

                <!-- Register Button -->
                <button type="submit" class="btn w-100 mt-4">Register</button>
            </form>
            <!-- Already Registered Link -->
            <div class="mt-3">
                <a href="{{ route('login') }}" class="forgot-password text-center">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
