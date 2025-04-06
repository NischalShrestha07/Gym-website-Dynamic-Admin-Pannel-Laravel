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

    public function checkIn(Request $request)
    {
        // Validate request data
        $request->validate([
            'latitude' => 'required|numeric|between:-90,90', // Ensure valid latitude
            'longitude' => 'required|numeric|between:-180,180', // Ensure valid longitude
        ]);

        $userId = Auth::id(); // Get the currently authenticated user ID

        // Ensure user is authenticated
        if (!$userId) {
            return response()->json(['success' => false, 'message' => 'User not authenticated'], 401);
        }

        $latitude = $request->latitude;
        $longitude = $request->longitude;

        // Get location name (with error handling)
        $locationName = $this->getLocationName($latitude, $longitude);
        if (!$locationName) {
            $locationName = 'Unknown Location'; // Fallback if geocoding fails
        }

        // Save check-in data
        $attendance = GeoAttendance::create([
            'user_id' => $userId,
            'check_in_time' => Carbon::now('Asia/Kathmandu'),
            'check_in_latitude' => $latitude,
            'check_in_longitude' => $longitude,
            'check_in_location_name' => $locationName,
        ]);

        // Log coordinates (assuming this method works fine)
        $this->logCoordinates($attendance->id, $latitude, $longitude);

        return response()->json([
            'success' => true,
            'message' => 'Checked in successfully!',
            'location' => $locationName, // Return the location for debugging
        ]);
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


    public function checkOut(Request $request)
    {
        // Validate request data
        $request->validate([
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        $userId = Auth::id();

        // Ensure user is authenticated
        if (!$userId) {
            return response()->json(['success' => false, 'message' => 'User not authenticated'], 401);
        }

        $latitude = $request->latitude;
        $longitude = $request->longitude;

        // Get location name (with error handling)
        $locationName = $this->getLocationName($latitude, $longitude);
        if (!$locationName) {
            $locationName = 'Unknown Location';
        }

        // Find the latest check-in record for the user
        $attendance = GeoAttendance::where('user_id', $userId)
            ->whereNotNull('check_in_time')
            ->whereNull('check_out_time') // Ensure no check-out has happened
            ->latest()
            ->first();

        if (!$attendance) {
            return response()->json(['success' => false, 'message' => 'No active check-in found'], 404);
        }

        // Calculate the total working hours
        // $checkInTime = Carbon::parse($attendance->check_in_time);
        // $checkOutTime = Carbon::now('Asia/Kathmandu');
        // $workingHours = $checkInTime->diffInHours($checkOutTime) + ($checkInTime->diffInMinutes($checkOutTime) % 60) / 60;

        $checkInTime = Carbon::parse($attendance->check_in_time);
        $checkOutTime = Carbon::now('Asia/Kathmandu');

        $workingHours = $checkInTime->diffInHours($checkOutTime) + ($checkInTime->diffInMinutes($checkOutTime) % 60) / 60;

        // Update attendance with check-out details
        $attendance->update([
            'check_out_time' => $checkOutTime,
            'check_out_latitude' => $latitude,
            'check_out_longitude' => $longitude,
            'check_out_location_name' => $locationName,
            'total_working_hours' => $workingHours,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Checked out successfully!',
            'location' => $locationName, // Return the location for debugging
        ]);
    }

    // Helper function to get location name using Google Maps API
    // private function getLocationName($latitude, $longitude)
    // {
    //     // Use an API like Google Maps to get the location name, or just return coordinates for now
    //     return "Location ($latitude, $longitude)";
    // }
    private function getLocationName($latitude, $longitude)
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY'); // Add your API key in .env
        if (!$apiKey) {
            \Log::error('Google Maps API key is missing');
            return null;
        }

        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$latitude},{$longitude}&key={$apiKey}";

        try {
            $response = \Http::get($url);
            $data = $response->json();

            if ($response->successful() && isset($data['results'][0]['formatted_address'])) {
                return $data['results'][0]['formatted_address'];
            } else {
                \Log::error('Geocoding failed: ' . json_encode($data));
                return null;
            }
        } catch (\Exception $e) {
            \Log::error('Geocoding error: ' . $e->getMessage());
            return null;
        }
    }


    // Method to show attendance coordinates in the admin panel
    // public function showAttendanceCoordinates()
    // {
    //     // Get all attendance records with their coordinates
    //     $attendanceRecords = AttendanceCoordinate::with('geoAttendance')->orderBy('recorded_at', 'desc')->get();
    //     if (Auth::user()->role === 'Admin') {
    //         return view('admin.attendCoordinate.adminCoord', compact('attendanceRecords'));
    //     } elseif (Auth::user()->role === 'Trainer') {
    //         return view('admin.attendCoordinate.trainerCoord', compact('attendanceRecords'));
    //     } elseif (Auth::user()->role === 'Staff') {
    //         return view('admin.attendCoordinate.staffCoord', compact('attendanceRecords'));
    //     } elseif (Auth::user()->role === 'Member') {
    //         return view('admin.attendCoordinate.memberCoord', compact('attendanceRecords'));
    //     }
    // }

    public function showAttendanceCoordinates()
    {
        if (Auth::user()->role === 'Admin') {
            // Admin sees all users' attendance
            $attendanceRecords = AttendanceCoordinate::with('geoAttendance.user')
                ->orderBy('recorded_at', 'desc')
                ->get();
            return view('admin.attendCoordinate.adminCoord', compact('attendanceRecords'));
        } else {
            // Other users see only their own attendance
            $attendanceRecords = AttendanceCoordinate::with('geoAttendance')
                ->where('user_id', Auth::id())
                ->orderBy('recorded_at', 'desc')
                ->get();

            if (Auth::user()->role === 'Trainer') {
                return view('admin.attendCoordinate.trainerCoord', compact('attendanceRecords'));
            } elseif (Auth::user()->role === 'Staff') {
                return view('admin.attendCoordinate.staffCoord', compact('attendanceRecords'));
            } elseif (Auth::user()->role === 'Member') {
                return view('admin.attendCoordinate.memberCoord', compact('attendanceRecords'));
            }
        }
    }
}
