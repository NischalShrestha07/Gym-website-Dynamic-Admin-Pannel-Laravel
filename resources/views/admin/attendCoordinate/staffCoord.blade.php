@extends('admin.layouts.staffLayout')

@section('content')

<!-- Bootstrap CSS CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div style="margin-left: 18vw;" class="container">
    <h1 class="text-center">Attendance Coordinates</h1>

    @if($attendanceRecords->isEmpty())
    <div class="alert alert-warning text-center" role="alert">
        No attendance records found.
    </div>
    @else
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>GeoAttendance Of</th>
                <th>Recorded At</th>
                <th>Latitude</th>
                <th>Longitude</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendanceRecords as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ Auth::user()->name }}</td>
                <td>{{ $record->recorded_at }}</td>
                <td>{{ $record->latitude }}</td>
                <td>{{ $record->longitude }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection