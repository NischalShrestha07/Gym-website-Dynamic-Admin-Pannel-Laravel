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
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>

    {{-- Create Announcement Form --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Create Announcement</div>
        <div class="card-body">
            <form action="{{ route('announcements.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter a title"
                        required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="3" class="form-control"
                        placeholder="Write the announcement details" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Create Announcement</button>
            </form>
        </div>
    </div>

    {{-- List of Announcements --}}
    <div class="row">
        @forelse($announcements as $announcement)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card shadow-sm border-primary">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ $announcement->title }}</h5>
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                        data-bs-target="#editAnnouncementModal{{ $announcement->id }}">Edit</button>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{ Str::limit($announcement->description, 100) }}</p>
                    <a href="#" class="btn btn-link text-primary" data-bs-toggle="collapse"
                        data-bs-target="#details{{ $announcement->id }}">Read More</a>
                    <div id="details{{ $announcement->id }}" class="collapse">
                        <p>{{ $announcement->description }}</p>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <small>Posted by {{ $announcement->user->name }} on {{ $announcement->created_at->format('d M, Y')
                        }}</small>
                    <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Edit Modal --}}
        <div class="modal fade" id="editAnnouncementModal{{ $announcement->id }}" tabindex="-1"
            aria-labelledby="editAnnouncementModalLabel{{ $announcement->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAnnouncementModalLabel{{ $announcement->id }}">Edit Announcement
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('announcements.update', $announcement->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title{{ $announcement->id }}" class="form-label">Title</label>
                                <input type="text" name="title" id="title{{ $announcement->id }}" class="form-control"
                                    value="{{ $announcement->title }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description{{ $announcement->id }}" class="form-label">Description</label>
                                <textarea name="description" id="description{{ $announcement->id }}" rows="3"
                                    class="form-control" required>{{ $announcement->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">No announcements available.</div>
        </div>
        @endforelse
    </div>

    {{-- Pagination
    <div class="d-flex justify-content-center">
        {{ $announcements->links() }}
    </div> --}}
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
@endsection