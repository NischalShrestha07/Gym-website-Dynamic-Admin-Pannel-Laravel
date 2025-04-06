@extends('admin.layouts.adminLayout')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5" style="margin-left: 18vw;">
    <h2 class="text-center mb-4">📍 Attendance Coordinates</h2>

    @if($attendanceRecords->isEmpty())
    <div class="alert alert-warning text-center" role="alert">
        No attendance records found.
    </div>
    @else
    <div class="table-responsive">
        <table class="table table-hover table-bordered shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Geo Attendance Of</th>
                    <th>Role</th>
                    <th>Recorded At</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendanceRecords as $index => $record)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $record->geoAttendance->user->name ?? 'Unknown' }}</td>
                    <td>{{$record->geoAttendance->user->role}}</td>
                    <td>{{ \Carbon\Carbon::parse($record->recorded_at)->format('d M Y, h:i A') }}</td>
                    <td>{{ $record->latitude }}</td>
                    <td>{{ $record->longitude }}</td>
                    <td>
                        <a href="https://www.google.com/maps?q={{ $record->latitude }},{{ $record->longitude }}"
                            target="_blank" class="btn btn-sm btn-outline-primary">
                            View on Map
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection