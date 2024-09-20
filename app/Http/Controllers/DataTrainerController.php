<?php

namespace App\Http\Controllers;

use App\Models\DataTrainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataTrainerController extends Controller
{
    public function index()
    {
        $trainers = DataTrainer::all();
        return view('admin.trainers.trainer', compact('trainers'));
    }

    public function AddNewTrainer(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'description' => 'nullable|string',
            'expertise' => 'required|string|max:255',
            'years_of_experience' => 'required|integer',
            'qualifications' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Create a new trainer
        $trainer = new DataTrainer();
        $trainer->name = $request->name;
        $trainer->phone = $request->phone;
        $trainer->description = $request->description;
        $trainer->expertise = $request->expertise;
        $trainer->years_of_experience = $request->years_of_experience;
        $trainer->qualifications = $request->qualifications;

        // Handle image upload
        if ($request->hasFile('image')) {
            $trainer->image = $request->file('image')->store('images/trainers', 'public');
        }

        $trainer->save();

        return redirect()->back()->with('success', 'Trainer added successfully!');
    }
}
