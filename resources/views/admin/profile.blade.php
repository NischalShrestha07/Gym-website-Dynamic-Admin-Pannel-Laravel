@php
$layout = match (Auth::user()->role) {
'Admin' => 'admin.layouts.adminLayout',
'Trainer' => 'admin.layouts.trainerLayout',
'Staff' => 'admin.layouts.staffLayout',
'Member' => 'admin.layouts.memberLayout',
default => 'layouts.memberLayout', // Fallback layout
};
@endphp

@extends($layout)

@section('customCss')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<style>
    .profile-card,
    .form-card {
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .profile-card:hover,
    .form-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.15);
    }

    .card-header {
        border-radius: 1rem 1rem 0 0;
        padding: 1.5rem;
    }

    .form-control,
    .form-select {
        border-radius: 0.5rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .btn-primary,
    .btn-secondary {
        border-radius: 0.5rem;
        padding: 0.75rem 2rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0a58ca;
        transform: translateY(-2px);
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: translateY(-2px);
    }

    .alert {
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
        animation: fadeIn 0.5s ease-in;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .avatar-img {
        border: 4px solid #fff;
        box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .container {
            margin-left: 0 !important;
        }
    }
</style>
@endsection

@section('title', 'User Profile')

@section('content')
<div class="container mt-5" style="margin-left: 20vw;">
    <div class="row g-4">
        <!-- Profile Sidebar -->
        <div class="col-md-3">
            <div class="card profile-card">
                <div class="card-body text-center p-4">
                    <img src="{{ $user->avatar ? asset('uploads/avatars/' . $user->avatar) : asset('images/default-avatar.png') }}"
                        alt="User Avatar" class="img-fluid rounded-circle mb-3 avatar-img"
                        style="width: 150px; height: 150px;">
                    <h5 class="card-title fw-bold">{{ $user->name }}</h5>
                    <p class="text-muted mb-0">{{ ucfirst($user->role) }}</p>
                    <small class="text-muted">Last updated: {{ $user->updated_at->diffForHumans() }}</small>
                </div>
            </div>
        </div>

        <!-- Profile Details -->
        <div class="notification-container">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
            </div>
            @endif
        </div>
        <style>
            .notification-container {
                position: fixed;
                top: 5px;
                right: 1px;
                z-index: 1050;
                /* Ensure it appears above other content */
                width: 350px;
                /* Fixed width for consistency */
            }

            .alert {
                border-radius: 0.75rem;
                margin-bottom: 1rem;
                animation: slideIn 0.5s ease-in;
                box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
            }

            @keyframes slideIn {
                from {
                    transform: translateY(-20px);
                    opacity: 0;
                }

                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                                    // Auto-dismiss alerts after 5 seconds
                                    const alerts = document.querySelectorAll('.alert-dismissible');
                                    alerts.forEach(alert => {
                                        setTimeout(() => {
                                            let bsAlert = new bootstrap.Alert(alert);
                                            bsAlert.close();
                                        }, 5000); // 5000ms = 5 seconds
                                    });

                                    // Form Validation (existing code)
                                    const forms = document.querySelectorAll('.needs-validation');
                                    forms.forEach(form => {
                                        form.addEventListener('submit', function (event) {
                                            if (!form.checkValidity()) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }
                                            form.classList.add('was-validated');
                                        }, false);
                                    });
                                });
        </script>
        <div class="col-md-9">
            <div class="card form-card">

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="bi bi-person-fill me-2"></i>Update Profile</h4>
                </div>

                <div class="card-body p-4">
                    <!-- Success/Error Messages -->
                    {{-- @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif --}}

                    <!-- Profile Update Form -->
                    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data"
                        class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                                    required>
                                <div class="invalid-feedback">Please enter your full name.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" required>
                                <div class="invalid-feedback">Please enter a valid email.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $user->phone }}" placeholder="e.g., +1234567890">
                            </div>
                            <div class="col-md-6">
                                <label for="dob" class="form-label fw-semibold">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="{{ $user->dob }}">
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label fw-semibold">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $user->address }}" placeholder="e.g., 123 Main St">
                            </div>
                            <div class="col-md-6">
                                <label for="gender" class="form-label fw-semibold">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="" disabled {{ !$user->gender ? 'selected' : '' }}>Select Gender
                                    </option>
                                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female
                                    </option>
                                    <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="avatar" class="form-label fw-semibold">Profile Picture</label>
                                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Save
                                Changes</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Change Password Section -->
            <div class="card form-card mt-4">
                <div class="card-header bg-secondary text-white">
                    <h4 class="mb-0"><i class="bi bi-lock-fill me-2"></i>Change Password</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('user.change-password') }}" method="POST" class="needs-validation"
                        novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="current_password" class="form-label fw-semibold">Current Password</label>
                                <input type="password" class="form-control" id="current_password"
                                    name="current_password" placeholder="Enter Current Password" required>
                                @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="invalid-feedback">Please enter your current password.</div>
                            </div>
                            <div class="col-12">
                                <label for="new_password" class="form-label fw-semibold">New Password</label>
                                <input type="password" placeholder="Enter New Password" class="form-control"
                                    id="new_password" name="new_password" required>
                                @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="invalid-feedback">Please enter a new password.</div>
                            </div>
                            <div class="col-12">
                                <label for="new_password_confirmation" class="form-label fw-semibold">Confirm New
                                    Password</label>
                                <input type="password" class="form-control" id="new_password_confirmation"
                                    name="new_password_confirmation" placeholder="Confirm New Password" required>
                                @error('new_password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="invalid-feedback">Please confirm your new password.</div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-secondary"><i class="bi bi-check-circle me-2"></i>Save
                                Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Form Validation -->
@section('customJs')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const forms = document.querySelectorAll('.needs-validation');
        forms.forEach(form => {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    });
</script>
@endsection
@endsection