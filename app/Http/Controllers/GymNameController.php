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
    }
}
