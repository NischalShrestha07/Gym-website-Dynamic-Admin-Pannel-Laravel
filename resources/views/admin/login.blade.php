{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login </title>

    <base href="{{ asset('admincss') }}/" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min2167.css?v=3.2.0">

    <style>
        /* Centering the login box */
        .login-page {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f4f6f9;
        }

        .login-box {
            width: 360px;
            padding: 20px;
        }

        /* Card styling */
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            font-weight: bold;
            text-align: center;
            font-size: 1.2em;
            padding: 15px;
        }

        /* Button styling */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
            font-weight: bold;
            font-size: 1.1em;
            padding: 10px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            box-shadow: 0 4px 8px rgba(0, 91, 179, 0.4);
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            border-radius: 5px;
            font-weight: bold;
            font-size: 1.1em;
            padding: 10px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
            box-shadow: 0 4px 8px rgba(90, 98, 104, 0.4);
        }

        /* Error message styling */
        .text-danger {
            font-size: 0.9em;
        }

        /* Input field styling */
        .input-group-text {
            background-color: #f0f3f5;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
        }
    </style>
</head>


<div class="container mt-5 d-flex justify-content-center align-items-center"
    style="min-height: 100vh; background-image: url('/images/background.jpg'); background-size: cover;">
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="card shadow-lg" style="border-radius: 15px;">
                <div class="card-header text-center bg-primary text-white"
                    style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <!-- Project Branding -->
                    <img src="{{ asset('admincss/dist/img/AdminLTELogo.png') }}" alt="Project Logo"
                        class="img-fluid mb-3" style="width: 80px;">
                    <h2>Login</h2>
                </div>

                <!-- Flash Messages with Enhanced UI -->
                <div class="mt-4 d-flex justify-content-center">
                    @if (session('success'))
                    <div class="m-2 p-3 text-center btn btn-success ">
                        <h3>{{ session('success') }}</h3>
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="m-2 p-3 text-center btn btn-danger ">
                        <h3>{{ session('error') }}</h3>
                    </div>
                    @endif
                </div>

                <!-- Login Form -->
                <div class="card-body p-4">
                    <form action="{{route('admin.authenticate')}}" method="post">
                        @csrf

                        <!-- Email Field -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control form-control-lg" id="email"
                                placeholder="Enter your email" required>
                        </div>

                        <!-- Password Field -->
                        <div class="form-group mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg" id="password"
                                placeholder="Enter your password" required>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="btn btn-primary btn-lg w-100"
                            style="border-radius: 8px;">Login</button>
                    </form>
                </div>
            </div>

            <!-- Registration Link -->
            <div class="text-center mt-4">
                <p>Don't have an account? <a href="{{route('admin.loadregister')}}" class="text-primary">Sign Up</a></p>
            </div>
        </div>
    </div>
</div>

<body class="hold-transition login-page">


    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min2167.js?v=3.2.0"></script>
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>

    <base href="{{ asset('admincss') }}/" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min2167.css?v=3.2.0">

    <style>
        /* Full-page centering with a gradient background */
        body,
        .login-page {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #f4f6f9 0%, #e9ecef 100%);
            font-family: 'Source Sans Pro', sans-serif;
        }

        /* Larger login box */
        .login-box {
            width: 450px;
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

        .form-control {
            border-radius: 6px;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            font-size: 1.1em;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
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

        /* Registration link with better visibility */
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
                <h2>Login</h2>
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

                <!-- Login Form -->
                <form action="{{ route('admin.authenticate') }}" method="post">
                    @csrf

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email"
                            required>
                    </div>

                    <!-- Password Field with Toggle -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Enter your password" required>
                            <span class="toggle-password fas fa-eye" onclick="togglePassword()"></span>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>

        <!-- Registration Link -->
        <div class="text-center">
            <p>Don't have an account? <a href="{{ route('admin.loadregister') }}">Sign Up</a></p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min2167.js?v=3.2.0"></script>

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