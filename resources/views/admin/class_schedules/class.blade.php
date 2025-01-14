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

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Class Schedule Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Class Schedule Management</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Class Schedule</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Class Name</th>
                                            <th>Instructor</th>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($classSchedules as $class)
                                        <tr>
                                            <td>{{ $class->class_name }}</td>
                                            <td>{{ $class->instructor }}</td>
                                            <td>{{ $class->day }}</td>
                                            <td>{{ $class->time }}</td>
                                            <td>
                                                <!-- Edit and Delete -->
                                                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#editClassModal{{ $class->id }}">Edit</button>
                                                <form action="{{ route('class-schedules.destroy', $class->id) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editClassModal{{ $class->id }}" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Class Schedule</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('class-schedules.update', $class->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="class_name">Class Name</label>
                                                                <input type="text" name="class_name"
                                                                    class="form-control"
                                                                    value="{{ $class->class_name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="instructor">Instructor</label>
                                                                <input type="text" name="instructor"
                                                                    class="form-control"
                                                                    value="{{ $class->instructor }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="day">Day</label>
                                                                <input type="text" name="day" class="form-control"
                                                                    value="{{ $class->day }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="time">Time</label>
                                                                <input type="time" name="time" class="form-control"
                                                                    value="{{ $class->time }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Save
                                                                Changes</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add Modal Trigger -->
                            <button class="btn btn-success mt-3" data-toggle="modal" data-target="#addClassModal">Add
                                New Class</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addClassModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Class Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('class-schedules.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="class_name">Class Name</label>
                        <input type="text" name="class_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="instructor">Instructor</label>
                        <input type="text" name="instructor" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="day">Day</label>
                        <input type="text" name="day" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" name="time" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add Class</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection