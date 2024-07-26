<?php

namespace App\Http\Controllers;

use App\Models\GymName;
use Illuminate\Http\Request;

class GymNameController extends Controller
{
    public function index()
    {
        $gymnames = GymName::all();
        return view('Dashboard.index', compact('gymnames'));
    }
    public function gymnames()
    {
        $gymnames = GymName::all();
        return view('Dashboard.gymnames', compact('gymnames'));
    }
    public function AddNewGymName(Request $request)
    {
        $request->validate([
            'gymname' => 'required|string',
            'home' => 'required|string',
            'whyus' => 'required|string',
            'trainers' => 'required|string',
            'contactus' => 'required|string',
        ]);

        $gymname = new GymName();
        $gymname->gymname = $request->gymname;
        $gymname->home = $request->home;
        $gymname->whyus = $request->whyus;
        $gymname->trainers = $request->trainers;
        $gymname->contactus = $request->contactus;
        $gymname->save();

        return redirect()->route('gymnames.index')->with('success', 'Gymname has been added successfully.');
    }
    public function UpdateGymName(Request $request)
    {
        $request->validate([
            'gymname' => 'required|string',
            'home' => 'required|string',
            'whyus' => 'required|string',
            'trainers' => 'required|string',
            'contactus' => 'required|string',
        ]);

        $gymname = GymName::find($request->input('id'));
        $gymname->gymname = $request->input('gymname');
        $gymname->home = $request->input('home');
        $gymname->whyus = $request->input('whyus');
        $gymname->trainers = $request->input('trainers');
        $gymname->contactus = $request->input('contactus');
        $gymname->save();
        return redirect()->back()->with('success', ' data updated successfully');
    }
    public function DeleteGymName($id)
    {
        $navdetail = GymName::find($id);
        $navdetail->delete();
        return redirect()->route('gymnames.index')->with('success', 'Navdetails deleted sucessfully.');
    }
}
