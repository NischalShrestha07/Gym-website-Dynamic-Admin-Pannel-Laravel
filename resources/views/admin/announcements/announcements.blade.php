@php
$layout = match (Auth::user()->role) {
'Admin' => 'admin.layouts.adminLayout',
'Trainer' => 'admin.layouts.trainerLayout',
'Staff' => 'admin.layouts.staffLayout',
'Member' => 'admin.layouts.memberLayout',
default => 'layouts.memberLayout',
};
@endphp

@extends($layout)

@section('content')
<div class="container mt-5" style="margin-left: 20vw">
    <h1 class="text-center mb-4">Announcements</h1>

    <div>
        @if (session('success'))
        <div class="alert alert-success text-white bg-success alert-dismissible custom-alert fade-in" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger text-white bg-danger alert-dismissible custom-alert fade-in" role="alert">
            <strong>Success!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    <div class="card mb-4 shadow-sm border-0 announcement-create-card">
        <div class="card-header bg-success text-white py-3 rounded-top">
            <h5 class="mb-0 fw-bold"><i class="bi bi-megaphone me-2"></i>Create New Announcement</h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('announcements.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-4">
                    <label for="title" class="form-label fw-semibold text-dark">Title</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-megaphone"></i></span>
                        <input type="text" name="title" id="title" class="form-control rounded-end"
                            placeholder="Enter announcement title" required>
                        <div class="invalid-feedback">
                            Please enter a title for your announcement.
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label fw-semibold text-dark">Description</label>
                    <textarea name="description" id="description" rows="5" class="form-control"
                        placeholder="Write your announcement details here..." required></textarea>
                    <div class="invalid-feedback">
                        Please provide announcement details.
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-outline-secondary px-4" onclick="this.form.reset()">
                        <i class="bi bi-arrow-counterclockwise me-2"></i>Clear
                    </button>
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-check-circle me-2"></i>Create Announcement
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Announcements List -->
    <div class="row g-4">
        @forelse($announcements as $announcement)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card h-100 shadow-sm border-0 announcement-card">
                <div class="card-header bg-gradient-primary text-white p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 fw-semibold text-truncate" title="{{ $announcement->title }}">
                            {{ $announcement->title }}
                        </h5>
                        {{-- <div class="card-actions d-flex gap-4">
                            <button class="btn btn-success edit-btn" data-bs-toggle="modal"
                                data-bs-target="#editAnnouncementModal{{ $announcement->id }}"
                                title="Edit Announcement">
                                Edit </button>
                            <!-- Delete Form -->
                            <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST"
                                class="d-inline-block delete-form" data-id="{{ $announcement->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger delete-btn" title="Delete"
                                    data-id="{{ $announcement->id }}" data-bs-toggle="modal"
                                    data-bs-target="#deleteAnnouncementModal{{ $announcement->id }}">
                                    Delete
                                </button>
                            </form>
                        </div> --}}

                        <div class="card-actions d-flex align-items-center gap-2">
                            <!-- Edit Button -->
                            <button class="btn btn-success edit-btn" data-bs-toggle="modal"
                                data-bs-target="#editAnnouncementModal{{ $announcement->id }}" title="Edit Announcement"
                                aria-label="Edit Announcement">
                                Edit
                            </button>

                            <!-- Delete Form -->
                            <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST"
                                class="d-inline-block delete-form" data-id="{{ $announcement->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger delete-btn" title="Delete Announcement"
                                    data-id="{{ $announcement->id }}" data-bs-toggle="modal"
                                    data-bs-target="#deleteAnnouncementModal{{ $announcement->id }}"
                                    aria-label="Delete Announcement">
                                    Delete
                                </button>
                            </form>
                        </div>

                        <!-- Enhanced CSS -->
                        <style>
                            .card-actions {
                                display: flex;
                                align-items: center;
                                gap: 0.5rem;
                                /* Reduced gap for a tighter layout */
                            }

                            .card-actions .btn {
                                padding: 0.5rem 1rem;
                                /* Consistent padding */
                                border-radius: 0.375rem;
                                /* Slightly rounded corners */
                                font-size: 0.9rem;
                                /* Slightly smaller text for compactness */
                                font-weight: 500;
                                /* Medium weight for readability */
                                transition: all 0.3s ease;
                                /* Smooth transitions */
                                display: flex;
                                align-items: center;
                                /* Center icon and text vertically */
                            }

                            .card-actions .btn-success {
                                background-color: #28A745;
                                border-color: #28A745;
                            }

                            .card-actions .btn-success:hover {
                                background-color: #218838;
                                border-color: #1e7e34;
                                transform: translateY(-2px);
                                /* Slight lift on hover */
                                box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
                                /* Subtle shadow */
                            }

                            .card-actions .btn-danger {
                                background-color: #DC3545;
                                border-color: #DC3545;
                            }

                            .card-actions .btn-danger:hover {
                                background-color: #c82333;
                                border-color: #bd2130;
                                transform: translateY(-2px);
                                /* Slight lift on hover */
                                box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
                                /* Subtle shadow */
                            }

                            .card-actions .bi {
                                font-size: 1rem;
                                /* Consistent icon size */
                            }

                            /* Ensure buttons remain compact on smaller screens */
                            @media (max-width: 576px) {
                                .card-actions .btn {
                                    padding: 0.4rem 0.8rem;
                                    font-size: 0.85rem;
                                }
                            }
                        </style>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="announcement-preview mb-3">
                        <p class="text-muted mb-0">{{ Str::limit($announcement->description, 120) }}</p>
                        @if(strlen($announcement->description) > 120)
                        <button class="btn btn-link p-0 text-primary read-more-btn" type="button"
                            data-bs-toggle="collapse" data-bs-target="#details{{ $announcement->id }}"
                            aria-expanded="false">
                            <small>Read More</small>
                        </button>
                        @endif
                    </div>
                    <div class="collapse" id="details{{ $announcement->id }}">
                        <div class="card card-body bg-light p-3 rounded">
                            <p class="mb-0">{{ $announcement->description }}</p>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white border-top p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="bi bi-person me-1"></i>{{ $announcement->user->name }}
                            <span class="ms-2">
                                <i class="bi bi-calendar me-1"></i>{{ $announcement->created_at->format('d M, Y') }}
                            </span>
                        </small>
                        <span class="badge bg-primary-subtle text-primary">
                            {{ $announcement->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editAnnouncementModal{{ $announcement->id }}" tabindex="-1"
            aria-labelledby="editAnnouncementModalLabel{{ $announcement->id }}">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="editAnnouncementModalLabel{{ $announcement->id }}">
                            <i class="bi bi-megaphone me-2"></i>Edit Announcement
                        </h5>

                        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <form action="{{ route('announcements.update', $announcement->id) }}" method="POST"
                            class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title{{ $announcement->id }}" class="form-label fw-semibold">Title</label>
                                <input type="text" name="title" id="title{{ $announcement->id }}" class="form-control"
                                    value="{{ $announcement->title }}" required>
                                <div class="invalid-feedback">Please enter a title.</div>
                            </div>
                            <div class="mb-3">
                                <label for="description{{ $announcement->id }}"
                                    class="form-label fw-semibold">Description</label>
                                <textarea name="description" id="description{{ $announcement->id }}" rows="4"
                                    class="form-control" required>{{ $announcement->description }}</textarea>
                                <div class="invalid-feedback">Please enter a description.</div>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Update Announcement</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteAnnouncementModal{{ $announcement->id }}" tabindex="-1"
            aria-labelledby="deleteAnnouncementModalLabel{{ $announcement->id }}">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteAnnouncementModalLabel{{ $announcement->id }}">
                            <i class="bi bi-trash me-2"></i>Confirm Deletion
                        </h5>
                        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <p class="mb-0">Are you sure you want to delete the announcement?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger confirm-delete-btn"
                            data-id="{{ $announcement->id }}">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center py-4">
                <i class="bi bi-info-circle me-2"></i>No announcements available at this time.
            </div>
        </div>
        @endforelse
    </div>

    <!-- Enhanced CSS -->
    <style>
        .announcement-create-card {
            border-radius: 0.75rem;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .announcement-create-card:hover {
            transform: scale(1.02);
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.2);
        }

        .announcement-card {
            border-radius: 0.75rem;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .announcement-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.2) !important;
        }

        .bg-gradient-primary {
            background: linear-gradient(45deg, #0d6efd, #0dcaf0);
        }

        .btn-success {
            background-color: #28A745;
            border-color: #28A745;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-danger {
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .card-actions .btn {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.25rem;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .read-more-btn {
            text-decoration: none !important;
            transition: color 0.3s ease;
        }

        .read-more-btn:hover {
            color: #0d6efd !important;
            text-decoration: underline !important;
        }

        .badge.bg-primary-subtle {
            background-color: rgba(13, 110, 253, 0.1);
        }
    </style>

    <!-- Enhanced JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Form Validation
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

            // Delete Confirmation
            document.querySelectorAll('.confirm-delete-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    const form = document.querySelector(`.delete-form[data-id="${id}"]`);
                    form.submit();
                });
            });
        });
    </script>

</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
@endsection