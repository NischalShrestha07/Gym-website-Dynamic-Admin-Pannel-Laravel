<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

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
    public function UpdateMembership(Request $request)
    {
        $request->validate([
            'member_name' => 'required|string|max:255',
            'membership_type' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|numeric',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',

        ]);

        $membership = Membership::findOrFail($request->input('id'));
        $membership->member_name = $request->input('member_name');
        $membership->membership_type = $request->input('membership_type');
        $membership->start_date = $request->input('start_date');
        $membership->end_date = $request->input('end_date');
        $membership->price = $request->input('price');
        $membership->email = $request->input('email');
        $membership->phone = $request->input('phone');
        $membership->address = $request->input('address');
        $membership->save();
        return redirect()->route('membership.create')->with('success', 'Membership updated successfully.');
    }


    public function destroy(Membership $membership, $id)
    {
        $membership = Membership::find($id);
        $membership->delete();
        return redirect()->route('admin.memberships.membership')->with('success', 'Membership deleted successfully.');
    }
}
