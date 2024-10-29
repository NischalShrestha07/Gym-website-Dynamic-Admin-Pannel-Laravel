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
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .card {
            max-width: 450px;
            /* Set a narrower maximum width for better focus */
            width: 100%;
            /* Full width for responsiveness */
            border-radius: 12px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            margin: 20px;
            /* Add margin for spacing */
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-size: 1.5rem;
            text-align: center;
            padding: 15px;
            /* Reduced padding for a tighter look */
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 1rem;
            /* Increase font size for better readability */
            margin-bottom: 15px;
            /* Add bottom margin for spacing */
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            padding: 10px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-label {
            font-weight: bold;
            /* Make labels bold for better readability */
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .card {
                max-width: 90%;
                /* Allow card to take more width on smaller screens */
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
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger text-white bg-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                    {{-- <div class="card-body">
                        <form action="{{ route('admin.register') }}" method="POST">
                            @csrf
                            <div>
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter full name" required>
                            </div>

                            <div>
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email address" required>
                            </div>

                            <div>
                                <label for="role" class="form-label">Role:</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option selected disabled>Select a role</option>
                                    <option value="admin">Admin</option>
                                    <option value="staff">Staff</option>
                                    <option value="trainer">Trainer</option>
                                    <option value="member">Member</option>
                                </select>
                            </div>

                            <div>
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter password" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>
                    </div> --}}

                    <div class="card-body">
                        <form action="{{ route('admin.register') }}" method="POST">
                            @csrf
                            <div>
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter full name" required>
                            </div>

                            <div>
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email address" required>
                            </div>

                            <div>
                                <label for="role" class="form-label">Role:</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option selected disabled>Select a role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Trainer">Trainer</option>
                                    <option value="Member">Member</option>
                                </select>
                            </div>

                            <div>
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter password" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>

                        <!-- Link to go back to the login page -->
                        <div class="text-center mt-3">
                            <a href="{{ route('admin.login') }}" class="text-decoration-none">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>