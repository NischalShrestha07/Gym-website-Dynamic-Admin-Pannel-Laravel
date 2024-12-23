<?php

namespace App\Http\Controllers;

use App\Models\AttendanceCoordinate;
use App\Models\GeoAttendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeoAttendanceController extends Controller
{
    // Get today's attendance summary
    public function summary()
    {
        $user = Auth::user();
        $employees = User::with('geo_attendance')->get();

        // Get today's attendance records
        $attendanceRecords = GeoAttendance::where('user_id', $user->id)
            ->whereDate('created_at', today())
            ->get();

        // return view('admin.geoAttendace.superGeo', compact('attendanceRecords', 'employees'));
        if (Auth::user()->role === 'Admin') {
            return view('admin.geoAttendance.adminGeo', compact('attendanceRecords', 'employees'));
        } elseif (Auth::user()->role === 'Staff') {
            return view('admin.geoAttendance.staffGeo', compact('attendanceRecords', 'employees'));
        } elseif (Auth::user()->role === 'Trainer') {
            return view('admin.geoAttendance.trainerGeo', compact('attendanceRecords', 'employees'));
        } elseif (Auth::user()->role === 'Member') {
            return view('admin.geoAttendance.memberGeo', compact('attendanceRecords', 'employees'));
        }
    }

    // Check-in method
    public function checkIn(Request $request)
    {
        // Validate request data
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $userId = Auth::id(); // Get the currently authenticated user ID
        $locationName = $this->getLocationName($request->latitude, $request->longitude); // Get location name

        // Save check-in data
        $attendance =   GeoAttendance::create([
            'user_id' => $userId,
            // 'check_in_time' => now(),
            'check_in_time' => Carbon::now('Asia/Kathmandu'),
            'check_in_latitude' => $request->latitude,
            'check_in_longitude' => $request->longitude,
            'check_in_location_name' => $locationName,
        ]);

        $this->logCoordinates($attendance->id, $request->latitude, $request->longitude);


        return response()->json(['success' => true, 'message' => 'Checked in successfully!']);
    }



    private function logCoordinates($geoAttendanceId, $latitude, $longitude)
    {
        // AttendanceCoordinate::create([
        //     'geo_attendance_id' => $geoAttendanceId,
        //     'recorded_at' => now(),
        //     'latitude' => $latitude,
        //     'longitude' => $longitude,
        // ]);
        // Check if the last recorded coordinate is older than 5 minutes
        $lastRecord = AttendanceCoordinate::where('geo_attendance_id', $geoAttendanceId)
            ->orderBy('recorded_at', 'desc')
            ->first();

        if (!$lastRecord || $lastRecord->recorded_at->diffInMinutes(now()) >= 5) {
            AttendanceCoordinate::create([
                'geo_attendance_id' => $geoAttendanceId,
                'recorded_at' => now(),
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]);
        }
    }



    // Check-out method is working and working hours is added in below code.
    // public function checkOut(Request $request)
    // {
    //     // Validate request data
    //     $request->validate([
    //         'latitude' => 'required|numeric',
    //         'longitude' => 'required|numeric',
    //     ]);

    //     $userId = Auth::id(); // Get the currently authenticated user ID
    //     $locationName = $this->getLocationName($request->latitude, $request->longitude); // Get location name

    //     // Save check-out data
    //     $attendance = GeoAttendance::where('user_id', $userId)->latest()->first();
    //     if ($attendance) {
    //         $attendance->update([
    //             'check_out_time' => now(),
    //             'check_out_latitude' => $request->latitude,
    //             'check_out_longitude' => $request->longitude,
    //             'check_out_location_name' => $locationName,
    //         ]);
    //     }

    //     return response()->json(['success' => true, 'message' => 'Checked out successfully!']);
    // }

    public function checkOut(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $userId = Auth::id();
        $locationName = $this->getLocationName($request->latitude, $request->longitude);

        $attendance = GeoAttendance::where('user_id', $userId)->latest()->first();


        if ($attendance && $attendance->check_in_time) {
            // Calculate the total working hours
            $checkInTime = Carbon::parse($attendance->check_in_time);
            // $checkOutTime = now();
            $checkOutTime = Carbon::now('Asia/Kathmandu');

            $workingHours = $checkInTime->diffInHours($checkOutTime) + ($checkInTime->diffInMinutes($checkOutTime) % 60) / 60;


            // Update attendance with check-out and working hours
            $attendance->update([
                'check_out_time' => $checkOutTime,
                'check_out_latitude' => $request->latitude,
                'check_out_longitude' => $request->longitude,
                'check_out_location_name' => $locationName,
                'total_working_hours' => $workingHours,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Checked out successfully!']);
    }

    // Helper function to get location name using Google Maps API
    private function getLocationName($latitude, $longitude)
    {
        // Use an API like Google Maps to get the location name, or just return coordinates for now
        return "Location ($latitude, $longitude)";
    }


    // Method to show attendance coordinates in the admin panel
    public function showAttendanceCoordinates()
    {
        // Get all attendance records with their coordinates
        $attendanceRecords = AttendanceCoordinate::with('geoAttendance')->orderBy('recorded_at', 'asc')->get();
        if (Auth::user()->role === 'Admin') {
            return view('admin.attendCoordinate.adminCoord', compact('attendanceRecords'));
        } elseif (Auth::user()->role === 'Trainer') {
            return view('admin.attendCoordinate.trainerCoord', compact('attendanceRecords'));
        } elseif (Auth::user()->role === 'Staff') {
            return view('admin.attendCoordinate.staffCoord', compact('attendanceRecords'));
        } elseif (Auth::user()->role === 'Member') {
            return view('admin.attendCoordinate.memberCoord', compact('attendanceRecords'));
        }
    }
}
