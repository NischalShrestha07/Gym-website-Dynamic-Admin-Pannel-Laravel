<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {

        $users = User::with('role')->where('role_id', '!=', 'Admin')->get();
        return view('admin.employee', compact('users'));

        // $employees = Employee::all();
    }
    public function AddNewEmployee(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|string',
            'email' => 'required|email',
            'joinDate' => 'nullable|string',
            'role' => 'nullable|string',
            'status' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('images/employees', 'public');
        }
        $employee = new Employee();
        $employee->photo = $photoPath;

        $employee->name = $request->input('name');
        $employee->mobile = $request->input('mobile');
        $employee->email = $request->input('email');
        $employee->joinDate = $request->input('joinDate');
        $employee->role = $request->input('role');
        $employee->status = $request->input('status');
        $employee->save();

        return redirect()->route('employee.create')->with('success', 'Employee Details Added Successfully.');
    }
    public function UpdateEmployee(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|string',
            'email' => 'required|email',
            'joinDate' => 'nullable|string',
            'role' => 'nullable|string',
            'status' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $employee = Employee::find($request->input('id'));


        if (!$employee) {
            return redirect()->route('employee.create')->with('error', 'Employee not found');
        }

        // Handle File Upload for image
        if ($request->hasFile('photo')) {
            // Store new image
            $photoPath = $request->file('photo')->store('images/employees', 'public');
            $employee->photo = $photoPath;
        }

        $employee->name = $request->input('name');
        $employee->mobile = $request->input('mobile');
        $employee->email = $request->input('email');
        $employee->joinDate = $request->input('joinDate');
        $employee->role = $request->input('role');
        $employee->status = $request->input('status');
        $employee->save();

        return redirect()->route('employee.create')->with('success', 'Employee Details Updated Successfully.');
    }
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->route('employee.create')->with('error', 'Employee Details Deleted Successfully.');
    }
}
