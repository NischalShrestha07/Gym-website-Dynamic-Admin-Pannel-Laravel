<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberships = Membership::all();
        return view('admin.memberships.membership', compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AddMembership(Request $request)
    {
        // Validation rules
        $request->validate([
            'member_name' => 'required|string|max:255',
            'membership_type' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|numeric',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'memberphoto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Creating a new Membership instance
        $membership = new Membership();
        $membership->member_name = $request->input('member_name');
        $membership->membership_type = $request->input('membership_type');
        $membership->start_date = $request->input('start_date');
        $membership->end_date = $request->input('end_date');
        $membership->price = $request->input('price');
        $membership->email = $request->input('email');
        $membership->phone = $request->input('phone');
        $membership->address = $request->input('address');

        // Handle the file upload
        if ($request->hasFile('memberphoto')) {
            $imagePath = $request->file('memberphoto')->store('images/memberships', 'public');
            $membership->memberphoto = $imagePath; // Assign the image path to the membership object
        }

        // Save the membership
        $membership->save();

        return redirect()->route('membership.create')->with('success', 'Membership created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'member_name' => 'required|string|max:255',
            'membership_type' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'address' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'memberphoto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            $membership = Membership::findOrFail($id);
            $membership->member_name = $request->member_name;
            $membership->membership_type = $request->membership_type;
            $membership->phone = $request->phone;
            $membership->email = $request->email;
            $membership->start_date = $request->start_date;
            $membership->end_date = $request->end_date;
            $membership->address = $request->address;
            $membership->price = $request->price;

            // Handle photo upload
            if ($request->hasFile('memberphoto')) {
                // Delete old photo if it exists
                if ($membership->memberphoto && Storage::disk('public')->exists($membership->memberphoto)) {
                    Storage::disk('public')->delete($membership->memberphoto);
                }

                // Store the new photo
                $path = $request->file('memberphoto')->store('images/memberships', 'public');
                $membership->memberphoto = $path; // Store the path in the database
            }

            $membership->save();

            return redirect()->back()->with('success', 'Member updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the member.');
        }
    }





    public function destroy($id)
    {
        $membership = Membership::find($id);
        $membership->delete();
        return redirect()->route('membership.create')->with('error', 'Membership deleted successfully.');
    }
}
