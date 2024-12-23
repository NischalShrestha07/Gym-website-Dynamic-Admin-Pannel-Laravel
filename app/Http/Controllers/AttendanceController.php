<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        // $users = Employee::all();
        $attendances = Attendance::all();
        if (Auth::user()->roleName === 'Admin') {
            return view('admin.attendance.adminAttendance', compact('attendances', 'users'));
        } elseif (Auth::user()->roleName === 'Member') {
            return view('admin.attendance.memberAttendance', compact('attendances', 'users'));
        } elseif (Auth::user()->roleName === 'Staff') {
            return view('admin.attendance.staffAttendance', compact('attendances', 'users'));
        } elseif (Auth::user()->roleName === 'Trainer') {
            return view('admin.attendance.trainerAttendance', compact('attendances', 'users'));
        }
    }


    public function addAttendance(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string',
            'date' => 'required|date',
            'first_in' => 'nullable',
            'break' => 'nullable',
            'last_out' => 'nullable',
            'total_hours' => 'nullable',
            'status' => 'nullable|string',
            'shift' => 'nullable|string',
            'capacity' => 'nullable',
            'overtime' => 'nullable',
        ]);
        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('images/attendances', 'public');
        }
        $attendance = new Attendance();
        $attendance->photo = $photoPath;

        $attendance->name = $request->input('name');
        $attendance->date = $request->input('date');
        $attendance->first_in = $request->input('first_in');
        $attendance->break = $request->input('break');
        $attendance->last_out = $request->input('last_out');
        $attendance->total_hours = $request->input('total_hours');
        $attendance->status = $request->input('status');
        $attendance->shift = $request->input('shift');
        $attendance->capacity = $request->input('capacity');
        $attendance->overtime = $request->input('overtime');
        $attendance->save();

        return redirect()->route('attendance.index')->with('success', 'Attendance Record Added Successfully.');
    }


    public function UpdateAttendance(Request $request)
    {

        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string',
            'date' => 'required|date',
            'first_in' => 'nullable',
            'break' => 'nullable',
            'last_out' => 'nullable',
            'total_hours' => 'nullable',

            'status' => 'nullable|string',
            'shift' => 'nullable|string',
            'capacity' => 'nullable',
            'overtime' => 'nullable',
        ]);
        $attendance = Attendance::findOrFail($request->input('id'));

        if (!$attendance) {
            return redirect()->route('attendance.create')->with('error', 'att$attendance not found');
        }

        if ($request->hasFile('photo')) {
            // Store new image
            $photoPath = $request->file('photo')->store('images/attendances', 'public');
            $attendance->photo = $photoPath;
        }

        $attendance->name = $request->input('name');
        $attendance->date = $request->input('date');
        $attendance->first_in = $request->input('first_in');
        $attendance->break = $request->input('break');
        $attendance->last_out = $request->input('last_out');
        $attendance->total_hours = $request->input('total_hours');
        $attendance->status = $request->input('status');
        $attendance->shift = $request->input('shift');
        $attendance->capacity = $request->input('capacity');
        $attendance->overtime = $request->input('overtime');
        $attendance->save();
        return redirect()->route('attendance.index')->with('success', 'Attendance Record Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance, $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendance.index')->with('error', 'Attendance Record Deleted Successfully.');
    }
}
