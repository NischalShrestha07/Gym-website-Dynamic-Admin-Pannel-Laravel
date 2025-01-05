<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    public function showProfile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            abort(403, 'No authenticated user found');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:10',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->gender = $request->gender;

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();

            // Ensure directory exists
            if (!file_exists(public_path('uploads/avatars'))) {
                mkdir(public_path('uploads/avatars'), 0755, true);
            }

            $avatar->move(public_path('uploads/avatars'), $avatarName);
            $user->avatar = $avatarName;
        }

        try {
            $user->save();
            return redirect()->back()->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error saving profile: ' . $e->getMessage());
        }
    }

    // public function changePassword(Request $request)
    // {
    //     $user = Auth::user();

    //     // Validate input
    //     $validator = Validator::make($request->all(), [
    //         'current_password' => 'required',
    //         'new_password' => 'required|confirmed',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     // Verify current password
    //     if (!Hash::check($request->current_password, $user->password)) {
    //         return redirect()->back()->with('error', 'Current password is incorrect.');
    //     }

    //     // Update password
    //     $user->password = Hash::make($request->new_password);
    //     $user->save();

    //     return redirect()->back()->with('success', 'Password changed successfully.');
    // }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        // Validate input
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Verify current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        // Update password
        $user->password = Hash::make($request->new_password); // Ensure password is hashed
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully.');
    }
}
