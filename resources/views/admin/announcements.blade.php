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
<div class="container">
    <h1 class="text-center mb-4">Announcements</h1>

    {{-- Success and Error Messages --}}
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Create Announcement Form --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Create Announcement</div>
        <div class="card-body">
            <form action="{{ route('announcements.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="3" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>

    {{-- List of Announcements --}}
    <div class="row">
        @foreach($announcements as $announcement)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $announcement->title }}</h5>
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                        data-bs-target="#editAnnouncementModal{{ $announcement->id }}">Edit</button>
                </div>
                <div class="card-body">
                    <p>{{ $announcement->description }}</p>
                </div>
                <div class="card-footer text-muted d-flex justify-content-between">
                    <span>Posted by {{ $announcement->user->name }} on {{ $announcement->created_at->format('d M, Y')
                        }}</span>
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
            <div class="modal-dialog">
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
        @endforeach
    </div>
</div>
@endsection