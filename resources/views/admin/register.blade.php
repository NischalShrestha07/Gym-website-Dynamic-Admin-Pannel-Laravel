{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        /* Center content vertically and horizontally */
        body,
        html {
            height: 100%;
            margin: 0;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .card {
            max-width: 400px;
            /* Optimized for desktop */
            width: 100%;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
            margin: 15px;
            background-color: #ffffff;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-size: 1.4rem;
            text-align: center;
            padding: 12px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            padding: 10px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .card {
                max-width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Register New User
                    </div>

                    <div id="flash-message-container" class="mt-3">
                        @if (session('success'))
                        <div class="alert alert-success text-white bg-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger text-white bg-danger alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter full name" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email address" required>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role:</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option selected disabled>Select a role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Trainer">Trainer</option>
                                    <option value="Member">Member</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter password" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('admin.login') }}" class="text-decoration-none">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Poppers -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Same assets as the login page -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('admincss/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admincss/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admincss/dist/css/adminlte.min2167.css') }}?v=3.2.0">

    <!-- Custom Styles -->
    <style>
        /* Full-page centering with a gradient background */
        body,
        html {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #f4f6f9 0%, #e9ecef 100%);
            font-family: 'Source Sans Pro', sans-serif;
            margin: 0;
        }

        /* Increased width for the login box */
        .login-box {
            margin-top: 55px;
            width: 600px;

            /* Increased from 450px to 550px */
            padding: 30px;
        }

        /* Card styling with a modern look */
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            background: #fff;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background: #dc3545;
            color: white;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .card-header img {
            width: 70px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .card-header h2 {
            margin: 0;
            font-size: 1.8em;
            font-weight: 700;
        }

        /* Form styling with better spacing */
        .card-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 1.1em;
        }

        /* Unified styling for inputs and dropdown */
        .form-control,
        .form-select {
            border-radius: 6px;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            font-size: 1.1em;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
            /* Ensure consistent width */
            box-sizing: border-box;
            /* Prevent padding from affecting width */
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #dc3545;
            box-shadow: 0 0 8px rgba(220, 53, 69, 0.3);
            outline: none;
        }

        /* Password field with toggle */
        .input-group {
            position: relative;
        }

        .input-group .form-control {
            padding-right: 40px;
            /* Space for the eye icon */
        }

        .input-group .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            font-size: 1.2em;
            transition: color 0.3s ease;
        }

        .input-group .toggle-password:hover {
            color: #dc3545;
        }

        /* Button styling */
        .btn-primary {
            background: #dc3545;
            border: none;
            border-radius: 6px;
            padding: 14px;
            font-size: 1.2em;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.2s ease;
            width: 100%;
        }

        .btn-primary:hover {
            background: #c82333;
            transform: scale(1.02);
        }

        /* Flash messages with better styling */
        .alert {
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1em;
            font-weight: 500;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Back to Login link with better visibility */
        .text-center {
            margin-top: 20px;
        }

        .text-center p {
            font-size: 1em;
            color: #555;
        }

        .text-center a {
            color: #dc3545;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .text-center a:hover {
            color: #c82333;
            text-decoration: underline;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <!-- Card Header -->
            <div class="card-header rounded">
                <img src="{{ asset('admincss/dist/img/royal2.webp') }}" alt="Project Logo" class="img-fluid mb-2">
                <h2>Register</h2>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <!-- Flash Messages -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <!-- Registration Form -->
                <form action="{{ route('admin.register') }}" method="POST">
                    @csrf
                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name"
                            required>
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter email address" required>
                    </div>

                    <!-- Role Field -->
                    <div class="form-group ">
                        <label for="role">Role</label>
                        <select class="form-control p-1" id="role" name="role" required>
                            <!-- Changed from form-select to form-control -->
                            <option selected disabled>Select a role</option>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                            <option value="Trainer">Trainer</option>
                            <option value="Member">Member</option>
                        </select>
                    </div>

                    <!-- Password Field with Toggle -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter password" required>
                            <span class="toggle-password fas fa-eye" onclick="togglePassword()"></span>
                        </div>
                    </div>

                    <!-- Register Button -->
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>

                <!-- Back to Login Link -->
                <div class="text-center">
                    <p>Already have an account? <a href="{{ route('admin.login') }}">Back to Login</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts (Same as Login Page) -->
    <script src="{{ asset('admincss/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admincss/dist/js/adminlte.min2167.js') }}?v=3.2.0"></script>

    <!-- Password Toggle Script -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>