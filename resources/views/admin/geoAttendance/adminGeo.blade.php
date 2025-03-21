@extends('admin.layouts.adminLayout')

@section('content')
<div style="margin-left: 18vw;" class="manage">
    <div class="container my-5" id="attendance-container">
        <h2 class="text-center mb-4">Attendance Tracking</h2>

        <div class="d-flex justify-content-center mb-4">
            <button id="check-in-btn" class="btn btn-success mx-2">
                <i class="fas fa-sign-in-alt"></i> Check In
            </button>
            <button id="check-out-btn" class="btn btn-danger mx-2">
                <i class="fas fa-sign-out-alt"></i> Check Out
            </button>
        </div>

        <div class="text-center">
            <div id="attendance-summary" class="alert alert-info">
                <!-- Attendance records will be populated here -->
            </div>
        </div>
    </div>

    <div class="container">
        <h3 class="mb-4"> Attendance List</h3>
        <table class="table table-striped table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>User</th>
                    <th>Role</th>
                    <th>Check In Time</th>
                    <th>Check In Latitude</th>
                    <th>Check In Longitude</th>
                    {{-- <th>Check In Location Name</th> --}}
                    <th>Check Out Time</th>
                    <th>Check Out Latitude</th>
                    <th>Check Out Longitude</th>
                    {{-- <th>Working Hours</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                @php
                $attendances = $employee->geo_attendance;
                @endphp
                @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->user->name }}</td>
                    <td>{{ $attendance->user->role }}</td>
                    <td>{{ $attendance->check_in_time }}</td>
                    <td>{{ $attendance->check_in_latitude }}</td>
                    <td>{{ $attendance->check_in_longitude }}</td>
                    {{-- <td>{{ $attendance->check_in_location_name }}</td> --}}
                    <td>{{ $attendance->check_out_time }}</td>
                    <td>{{ $attendance->check_out_latitude }}</td>
                    <td>{{ $attendance->check_out_longitude }}</td>
                    {{-- <td>{{ $attendance->total_working_hours }}</td> --}}
                    <td>
                        <button class="btn btn-info" data-toggle="modal" data-target="#detailsModal{{ $employee->id }}"
                            onclick="loadMap({{ $attendance->check_in_latitude }}, {{ $attendance->check_in_longitude }}, {{ $attendance->check_out_latitude }}, {{ $attendance->check_out_longitude }}, '{{ $employee->id }}')">
                            <i class="fas fa-info-circle"></i> View Details
                        </button>
                    </td>
                </tr>

                <div class="modal fade" id="detailsModal{{ $employee->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $employee->name }}'s Attendance Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Check In Time:</strong> {{ $attendance->check_in_time }}</p>
                                <p><strong>Check Out Time:</strong> {{ $attendance->check_out_time ?? 'N/A' }}</p>
                                <p><strong>Role:</strong>{{ $attendance->user->role }}</p>
                                {{-- <p><strong>Check In Location:</strong> {{ $attendance->check_in_location_name }}
                                </p> --}}
                                {{-- <p><strong>Check Out Location:</strong> {{ $attendance->check_out_location_name ??
                                    'N/A'
                                    }}</p> --}}
                                <div id="map{{ $employee->id }}" style="width:100%; height:400px; margin-top: 20px;">
                                </div>
                                <div id="mapError{{ $employee->id }}" class="text-danger mt-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8pReSkfGau-MagJruVLUxcNF91I_VP5E&callback=initMap" async
    defer></script>

<script>
    function initMap() {}

    function loadMap(checkInLat, checkInLng, checkOutLat, checkOutLng, employeeId) {
        const mapContainer = document.getElementById(`map${employeeId}`);
        const mapError = document.getElementById(`mapError${employeeId}`);
        mapError.innerHTML = "";

        if (checkInLat && checkInLng) {
            const map = new google.maps.Map(mapContainer, {
                center: { lat: checkInLat, lng: checkInLng },
                zoom: 15
            });

            new google.maps.Marker({
                position: { lat: checkInLat, lng: checkInLng },
                map: map,
                title: "Check-In Location",
                label: "C"
            });

            if (checkOutLat && checkOutLng) {
                new google.maps.Marker({
                    position: { lat: checkOutLat, lng: checkOutLng },
                    map: map,
                    title: "Check-Out Location",
                    label: "O"
                });
            }
        } else {
            mapError.innerHTML = "Location data is not available for this record.";
            mapContainer.innerHTML = "";
        }
    }
document.getElementById('check-in-btn').addEventListener('click', function () {
if (!navigator.geolocation) {
alert('Geolocation is not supported by your browser');
return;
}

navigator.geolocation.getCurrentPosition(
function (position) {
fetch('{{ route('attendance.checkin') }}', {
method: 'POST',
headers: {
'Content-Type': 'application/json',
'X-CSRF-TOKEN': '{{ csrf_token() }}'
},
body: JSON.stringify({
latitude: position.coords.latitude,
longitude: position.coords.longitude
})
})
.then(response => response.json())
.then(data => {
if (data.success) {
alert(data.message);
} else {
alert('Check-in failed: ' + data.message);
}
})
.catch(error => {
alert('An error occurred while checking in: ' + error.message);
});
},
function (error) {
alert(getGeolocationErrorMessage(error));
}
);
});
// Function to get error messages based on geolocation error
function getGeolocationErrorMessage(error) {
switch (error.code) {
case error.PERMISSION_DENIED:
return "Location access denied. Please enable it to check in.";
case error.POSITION_UNAVAILABLE:
return "Location information is unavailable.";
case error.TIMEOUT:
return "Location request timed out.";
default:
return "An unknown error occurred.";
}
}
    document.getElementById('check-out-btn').addEventListener('click', function () {
        navigator.geolocation.getCurrentPosition(function (position) {
            fetch('{{ route('attendance.checkout') }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ latitude: position.coords.latitude, longitude: position.coords.longitude })
            })
            .then(response => response.json())
            .then(data => alert(data.success ? 'Checked out successfully!' : 'Check-out failed: ' + data.message))
            .catch(console.error);
        });
    });
</script>
@endsection