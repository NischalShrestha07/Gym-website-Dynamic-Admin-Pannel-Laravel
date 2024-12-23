@php
$layout = match (Auth::user()->role) {
'Admin' => 'admin.layouts.adminLayout',
'Trainer' => 'admin.layouts.trainerLayout',
'Staff' => 'admin.layouts.staffLayout',
'Member' => 'admin.layouts.memberLayout',
default => 'layouts.memberLayout', // Optional fallback layout
};
@endphp

@extends($layout)


@section('title', 'User Profile')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Profile Sidebar -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ $user->avatar ? asset('') : asset('images/default-avatar.png') }}" alt="User Avatar"
                        class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="text-muted">{{ $user->role }}</p>
                    <a href="#update-avatar" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal">Change
                        Avatar</a>
                </div>
            </div>
        </div>

        <!-- Profile Details -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Profile Details</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6><strong>Name:</strong></h6>
                            <p>{{ $user->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6><strong>Email:</strong></h6>
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6><strong>Phone:</strong></h6>
                            <p>{{ $user->phone ?? 'Not Available' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6><strong>Joined On:</strong></h6>
                            <p>{{ $user->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6><strong>Address:</strong></h6>
                            <p>{{ $user->address ?? 'Not Provided' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6><strong>Role:</strong></h6>
                            <p>{{ $user->role }}</p>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <a href="" class="btn btn-warning">Edit Profile</a>
                        <a href="#change-password" class="btn btn-danger" data-bs-toggle="modal">Change Password</a>
                    </div>
                </div>
            </div>

            <!-- Additional Details -->
            <div class="card mt-4">
                <div class="card-header bg-secondary text-white">
                    <h4>Account Settings</h4>
                </div>
                {{-- <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Email Notifications
                            <span><input type="checkbox" {{ $user->notifications ? 'checked' : '' }}></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Two-Factor Authentication
                            <span><input type="checkbox" {{ $user->two_factor ? 'checked' : '' }}></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Account Status
                            <span class="badge bg-success">Active</span>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
<div class="modal fade" id="update-avatar" tabindex="-1" aria-labelledby="updateAvatarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateAvatarLabel">Update Avatar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Upload New Avatar</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="change-password" tabindex="-1" aria-labelledby="changePasswordLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection