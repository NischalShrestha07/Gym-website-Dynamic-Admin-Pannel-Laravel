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

    public function AddNewDataTrainer(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'dob' => 'nullable|date',
            'date_of_join' => 'nullable|date',
            'address' => 'nullable|string',
            'salary' => 'nullable',
            'gender' => 'nullable',
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
        $trainer->dob = $request->input('dob');
        $trainer->date_of_join = $request->input('date_of_join');
        $trainer->address = $request->input('address');
        $trainer->salary = $request->input('salary');
        $trainer->gender = $request->input('gender');
        $trainer->expertise = $request->input('expertise');
        $trainer->years_of_experience = $request->input('years_of_experience');
        $trainer->qualifications = $request->input('qualifications');

        // // Handle image upload
        // if ($request->hasFile('image')) {
        //     $trainer->image = $request->file('image')->store('images/trainers', 'public');
        // }

        $trainer->save();
        // dd($request->all());


        return redirect()->route('datatrainer.create')->with('success', 'Trainer Added Successfully!');
    }
    public function UpdateDataTrainer(Request $request)
    {


        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'dob' => 'nullable|date',
            'date_of_join' => 'nullable|date',
            'address' => 'nullable|string',
            'salary' => 'nullable',
            'gender' => 'nullable',
            'expertise' => 'required|string|max:255',
            'years_of_experience' => 'required|integer',
            'qualifications' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $trainer = DataTrainer::find($request->input('id'));

        if (!$trainer) {
            return redirect()->route('datatrainer.create')->with('error', 'Trainer not found');
        }

        // Handle File Upload for image
        if ($request->hasFile('image')) {
            // Store new image
            $imagePath = $request->file('image')->store('images/trainers', 'public');
            $trainer->image = $imagePath;
        }

        // Update the trainer details

        $trainer->name = $request->input('name');
        $trainer->phone = $request->input('phone');
        $trainer->dob = $request->input('dob');
        $trainer->date_of_join = $request->input('date_of_join');
        $trainer->address = $request->input('address');
        $trainer->salary = $request->input('salary');
        $trainer->gender = $request->input('gender');
        $trainer->expertise = $request->input('expertise');
        $trainer->years_of_experience = $request->input('years_of_experience');
        $trainer->qualifications = $request->input('qualifications');

        // Save the updated trainer
        $trainer->save();

        return redirect()->route('datatrainer.create')->with('success', 'Trainer Updated Successfully!');
    }


    public function destroy($id)
    {
        $data = DataTrainer::find($id);
        $data->delete();

        return redirect()->route('datatrainer.create')->with('error', 'Trainer Deleted Successfully.');
    }
}
