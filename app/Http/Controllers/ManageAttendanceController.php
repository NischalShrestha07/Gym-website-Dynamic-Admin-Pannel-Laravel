<?php

namespace App\Http\Controllers;

use App\Models\ManageAttendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ManageAttendanceController extends Controller
{
    public function index()
    {
        // Get all employees with their attendance data
        $employees = User::all();
        if (Auth::user()->role === 'Admin') {
            return view('admin.ManageAttendance.adminManageAttendance', compact('employees'));
        } elseif (Auth::user()->role === 'Staff') {
            return view('admin.ManageAttendance.staffManageAttendance', compact('employees'));
        } elseif (Auth::user()->role === 'Member') {
            return view('admin.ManageAttendance.memberManageAttendance', compact('employees'));
        } elseif (Auth::user()->role === 'Trainer') {
            return view('admin.ManageAttendance.trainerManageAttendance', compact('employees'));
        }
    }

    // Store or update attendance
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'status' => 'required|in:full_day_present,half_day_present,absent',
        ]);

        // Get the date from the request and extract the month
        $date = $request->date;
        $month = \Carbon\Carbon::parse($date)->format('F'); // Extract the month from the date

        // Create or update attendance for the selected employee and date
        ManageAttendance::updateOrCreate(
            [
                'employee_id' => $request->employee_id,
                'date' => $date,
            ],
            [
                'month' => $month, // Assign the month value
                'status' => $request->status,
            ]
        );

        return redirect()->back()->with('success', 'Attendance updated successfully.');
    }

    // Record login attendance with geolocation
    public function loginAttendance(Request $request)
    {
        $user = Auth::user();
        $currentDateTime = now();
        $month = $currentDateTime->format('F');
        $loginTime = $currentDateTime->toTimeString();
        $geolocation = $this->getGeolocation();

        // Check if the user has already logged in today
        $attendance = ManageAttendance::where('employee_id', $user->id)
            ->whereDate('date', $currentDateTime->toDateString())
            ->first();

        if ($attendance) {
            return response()->json(['message' => 'You have already logged in today'], 400);
        }

        // Store login attendance
        ManageAttendance::create([
            'employee_id' => $user->id,
            'date' => $currentDateTime->toDateString(),
            'status' => 'logged_in',
            'month' => $month,
            'login_time' => $loginTime,
            'geolocation' => $geolocation,
        ]);

        return response()->json(['message' => 'Attendance logged successfully']);
    }

    // Record logout attendance
    // public function logoutAttendance(Request $request)
    // {
    //     $user = Auth::user();
    //     $currentDateTime = now();
    //     $logoutTime = $currentDateTime->toTimeString();

    //     // Find today's attendance
    //     $attendance = ManageAttendance::where('employee_id', $user->id)
    //         ->whereDate('date', $currentDateTime->toDateString())
    //         ->first();

    //     if (!$attendance) {
    //         return response()->json(['message' => 'No attendance record found for today'], 400);
    //     }

    //     // Update the attendance with logout time
    //     $attendance->update([
    //         'status' => 'logged_out',
    //         'logout_time' => $logoutTime,
    //     ]);

    //     return response()->json(['message' => 'Logout time recorded successfully']);
    // }

    // Record logout attendance
    public function logoutAttendance(Request $request)
    {
        $user = Auth::user();
        $currentDateTime = now();
        $logoutTime = $currentDateTime->toTimeString();

        // Find today's attendance
        // $attendance = ManageAttendance::where('employee_id', $user->id)
        //     ->whereDate('date', $currentDateTime->toDateString())
        //     ->first();
        $attendance = ManageAttendance::where('employee_id', $user->id)
            ->whereDate('date', $currentDateTime->toDateString())
            ->first();


        if (!$attendance) {
            return response()->json(['message' => 'No attendance record found for today'], 400);
        }

        // Update the attendance with logout time without affecting login time
        $attendance->update([
            'status' => 'logged_out', // Change the status to logged_out
            'logout_time' => $logoutTime, // Store the logout time
            // Note: Don't include login_time here so it remains unchanged
        ]);

        return response()->json(['message' => 'Logout time recorded successfully']);
    }

    // Get geolocation from user's IP address
    // private function getGeolocation()
    // {
    //     $ip = request()->ip();
    //     try {
    //         $response = @file_get_contents("http://ip-api.com/json/{$ip}");
    //         if ($response === false) {
    //             return 'Unknown';
    //         }
    //         $data = json_decode($response, true);
    //         return isset($data['city']) ? "{$data['city']}, {$data['regionName']}, {$data['country']}" : 'Unknown';
    //     } catch (\Exception $e) {
    //         return 'Unknown';
    //     }
    // }
    private function getGeolocation()
    {
        $ip = request()->ip();
        // Debugging: Log the IP address
        Log::info("User IP Address: " . $ip);

        try {
            $response = @file_get_contents("http://ip-api.com/json/{$ip}");
            if ($response === false) {
                return 'Unknown';
            }
            $data = json_decode($response, true);
            return isset($data['city']) ? "{$data['city']}, {$data['regionName']}, {$data['country']}" : 'Unknown';
        } catch (\Exception $e) {
            Log::error("Geolocation error: " . $e->getMessage());
            return 'Unknown';
        }
    }
}
