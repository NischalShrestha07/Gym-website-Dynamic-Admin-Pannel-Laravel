<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\GeoAttendance;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    // public function dashboard()
    // {
    //     return view('admin.dashboard.adminDashboard');
    // }
    public function form()
    {
        return view('admin.form');
    }

    public function logout()
    {
        // Auth::guard('admin')->logout();
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Logged Out Successfully.');
    }




    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        // dd($req->all());
        // if (Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password])) {
        //     if (Auth::guard('admin')->user()->role != 'admin') {
        //         Auth::guard('admin')->logout();
        //         return redirect()->route('admin.login')->with('error', 'Unauthoried Error. Access Denied');
        //     }
        // } else {
        //     return redirect()->route('admin.login')->with('error', 'Something went wrong.');
        // }
        // return redirect()->route('admin.dashboard');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if (Auth::user()->role == 'Admin') {
                $employee = Employee::all();
                $memberships = Membership::all();
                $attendance = GeoAttendance::all();
                return view('admin.dashboard.adminDashboard', compact('employee', 'memberships', 'attendance'));
            } elseif (Auth::user()->role == 'Trainer') {
                return view('admin.dashboard.trainerDashboard');
            } elseif (Auth::user()->role == 'Staff') {
                return view('admin.dashboard.staffDashboard');
            } elseif (Auth::user()->role == 'Member') {
                return view('admin.dashboard.memberDashboard');
            } else {
                Auth::logout();
                return redirect()->route('admin.login')->with('error', 'Unauthorized user. Access Denied.');
            }
        }
        return redirect()->route('admin.login')->with('error', 'Email & Password are incorrect.');
    }

    public function redirectToDashboard()
    {
        if (Auth::user()->role === 'Admin') {
            return redirect()->route('dashboard');
        } elseif (Auth::user()->role === 'Staff') {
            return redirect()->route('staffDashboard');
        } elseif (Auth::user()->role === 'Trainer') {
            return redirect()->route('trainerDashboard');
        } elseif (Auth::user()->role === 'Member') {
            return redirect()->route('memberDashboard');
        }

        return redirect()->route('memberDashboard'); // Fallback for other roles or superadmin
    }
    // public function register()
    // {
    //     $user = new User();
    //     $user->name = 'Admin';
    //     $user->role = 'admin';
    //     $user->email = 'admin@gmail.com';
    //     $user->password = Hash::make('admin');
    //     $user->save();

    //     // $user->name = 'Narayan';
    //     // $user->role = 'staff';
    //     // $user->email = 'nischalshrestha800@gmail.com';
    //     // $user->password = Hash::make('admin');
    //     // $user->save();

    //     return redirect()->route('admin.login')->with('success', 'User Created Successfully.');
    // }



    public function loadregister(Request $request)
    {
        return view('admin.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => 'required|string',
            'password' => 'required',
        ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role' => $request->role,
        // ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();
        return redirect()->route('admin.login')->with('success', 'User Registered successfully.');
    }
}
