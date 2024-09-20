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

        // Handle File Upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/trainers', 'public');
        }

        // Create a new trainer
        $trainer = new DataTrainer();
        $trainer->name = $request->input('name');


        $trainer->image = $imagePath;

        $trainer->phone = $request->input('phone');
        $trainer->description = $request->input('description');
        $trainer->expertise = $request->input('expertise');
        $trainer->years_of_experience = $request->input('years_of_experience');
        $trainer->qualifications = $request->input('qualifications');

        // // Handle image upload
        // if ($request->hasFile('image')) {
        //     $trainer->image = $request->file('image')->store('images/trainers', 'public');
        // }

        $trainer->save();
        dd($request->all());


        return redirect()->route('datatrainer.create')->with('success', 'Trainer added successfully!');
    }
}
