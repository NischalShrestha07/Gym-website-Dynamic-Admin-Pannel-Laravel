<?php

namespace App\Http\Controllers;

use App\Models\AttendanceCoordinate;
use App\Models\GeoAttendance;
use Illuminate\Http\Request;

class AttendanceCoordController extends Controller
{
    // Check-in method
    public function checkIns(Request $request)
    {
        // Validate the request
        $request->validate([
            'staff_id' => 'required|exists:staff,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Record the check-in in the geo_attendance table
        $attendance = GeoAttendance::create([
            'staff_id' => $request->staff_id,
            'check_in' => now(),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        // Log initial coordinates
        $this->logCoordinates($attendance->id, $request->latitude, $request->longitude);

        // Schedule coordinate logging every 5 minutes
        $this->scheduleCoordinateLogging($attendance->id);

        return response()->json(['message' => 'Checked in successfully.']);
    }

    // Method to log coordinates in the new table
    private function logCoordinates($geoAttendanceId, $latitude, $longitude)
    {
        AttendanceCoordinate::create([
            'geo_attendance_id' => $geoAttendanceId,
            'recorded_at' => now(),
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
    }

    // Show attendance coordinates
    public function showCoordinates()
    {
        // Fetch all attendance coordinates
        $attendanceRecords = AttendanceCoordinate::with('geoAttendance') // Assuming you have set up the relationship
            ->orderBy('recorded_at', 'desc')
            ->get();

        return view('admin.attenCoordinate.superCoord', compact('attendanceRecords'));
    }

    // Schedule coordinate logging every 5 minutes
    private function scheduleCoordinateLogging($geoAttendanceId)
    {
        // Use a queue job to log coordinates every 5 minutes
        \Illuminate\Support\Facades\Queue::later(now()->addMinutes(5), new LogCoordinatesJob($geoAttendanceId));
    }

    // Check-out methods (implement as needed)
    public function checkOuts(Request $request)
    {
        // Implement your check-out logic here
    }
}
