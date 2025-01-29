<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 0.875rem;
            margin: 0;
            padding: 0;
        }
        .container {
            border-radius: 12px;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            max-width: 900px;
            border: 1px solid #ddd;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        .card-header {
            font-size: 1.2rem;
            font-weight: 500;
            text-align: center;
            padding: 12px;
            background-color: #0062cc;
            color: white;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .card-body {
            padding: 25px;
            background-color: #f9f9f9;
        }
        .btn-custom {
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 6px;
            width: 100%;
            font-size: 0.875rem;
        }
        .btn-save {
            background-color: #28a745;
            color: white;
        }
        .btn-save:hover {
            background-color: #218838;
        }
        .btn-update {
            background-color: #ffc107;
            color: black;
        }
        .btn-update:hover {
            background-color: #e0a800;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ddd;
        }
        .header-section h2 {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
            margin: 0;
        }
        .header-section p {
            font-size: 1rem;
            color: #777;
            margin: 0;
        }
        .back-btn {
            font-size: 0.875rem;
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }
        .back-btn:hover {
            text-decoration: underline;
        }
        .form-label {
            font-weight: 500;
            font-size: 0.875rem;
        }
        .form-control {
            border-radius: 6px;
            padding: 0.625rem 1rem;
            font-size: 0.875rem;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #0062cc;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .footer-section {
            text-align: center;
            margin-top: 30px;
            color: #888;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header Section -->
        <header class="header-section">
            <div>
                <h2>Profile Management</h2>
                <p>Update and manage your profile information seamlessly.</p>
            </div>
            <a href="{{route('user.dashboard')}}" class="back-btn">Back to Dashboard</a>
        </header>

        <main>
            <div class="row justify-content-center">

                <!-- Update Profile Information -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <strong>Update Profile Information</strong>
                        </div>
                        <div class="card-body">
                            <!-- Include update profile form -->
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <!-- Update Password -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <strong>Update Password</strong>
                        </div>
                        <div class="card-body">
                            <!-- Include update password form -->
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <!-- Delete User -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <strong>Delete Account</strong>
                        </div>
                        <div class="card-body">
                            <!-- Include delete user form -->
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <!-- Footer Section -->
        <footer class="footer-section">
            <p>&copy; 2025 Profile Management. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
