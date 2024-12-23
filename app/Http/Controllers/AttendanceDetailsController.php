<?php

namespace App\Http\Controllers;

use App\Models\AttendanceDetails;
use App\Models\GeoAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceDetailsController extends Controller
{
    public function index()
    {
        $attendanceDetails = AttendanceDetails::with('geoAttendance')->get();
        return view('admin.attenDetails.attendanceDetails', compact('attendanceDetails'));
    }
    public function checkIn(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id', // Ensure user exists
            'check_in_time' => 'required|date',
            'check_in_latitude' => 'required|numeric',
            'check_in_longitude' => 'required|numeric',
            'check_in_location_name' => 'required|string|max:255',
            // Add any other fields that you might want to validate
        ]);

        // Start a database transaction to ensure both saves succeed or fail together
        DB::transaction(function () use ($validatedData) {
            // Create the geo attendance record
            $attendance = new GeoAttendance();
            $attendance->user_id = $validatedData['user_id'];
            $attendance->check_in_time = $validatedData['check_in_time'];
            $attendance->check_in_latitude = $validatedData['check_in_latitude'];
            $attendance->check_in_longitude = $validatedData['check_in_longitude'];
            $attendance->check_in_location_name = $validatedData['check_in_location_name'];
            $attendance->save();

            // Create the attendance details record
            $attendanceDetail = new AttendanceDetails();
            $attendanceDetail->geo_attendance_id = $attendance->id; // Link to the geo_attendance ID
            $attendanceDetail->recorded_time = $attendance->check_in_time; // Use the check-in time
            $attendanceDetail->latitude = $attendance->check_in_latitude; // Use the check-in latitude
            $attendanceDetail->longitude = $attendance->check_in_longitude; // Use the check-in longitude
            $attendanceDetail->location_name = $attendance->check_in_location_name; // Use the check-in location name
            $attendanceDetail->save();
        });

        return redirect()->route('attendance.details.index')->with('success', 'Check-in recorded successfully.');
    }
}
