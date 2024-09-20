<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function form()
    {
        return view('admin.form');
    }
    // public function trainer()
    // {
    //     return view('admin.trainers.trainer');
    // }
    // public function membership()
    // {
    //     return view('admin.memberships.membership');
    // }
    // public function class()
    // {
    //     return view('admin.class_schedules.class');
    // }
    // public function billing()
    // {
    //     return view('admin.billings.billing');
    // }
    // public function setting()
    // {
    //     return view('admin.setting');
    // }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged Out Successfully.');
    }
    public function authenticate(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        // dd($req->all());
        if (Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password])) {
            if (Auth::guard('admin')->user()->role != 'admin') {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error', 'Unauthoried Error. Access Denied');
            }
        } else {
            return redirect()->route('admin.login')->with('error', 'Something went wrong.');
        }
        return redirect()->route('admin.dashboard');
    }
    public function register()
    {
        $user = new User();
        $user->name = 'Admin';
        $user->role = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('admin');
        $user->save();

        // $user->name = 'Narayan';
        // $user->role = 'staff';
        // $user->email = 'nischalshrestha800@gmail.com';
        // $user->password = Hash::make('admin');
        // $user->save();

        return redirect()->route('admin.login')->with('success', 'User Created Successfully.');
    }
}
