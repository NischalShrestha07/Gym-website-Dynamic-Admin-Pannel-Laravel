<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class TrainerController extends Controller
{
    public function index()
    {
        return view('Dashboard.index');
    }
    public function trainers()
    {
        $trainers = Trainer::all();
        return view('Dashboard.trainers', compact('trainers'));
    }
    public function AddNewTrainer(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        // Handle File Upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('uploads/trainers', 'public');
        }

        // Create a new trainer record
        $trainer = new Trainer();
        $trainer->name = $request->name;
        $trainer->photo = $photoPath;
        $trainer->facebook = $request->facebook;
        $trainer->twitter = $request->twitter;
        $trainer->instagram = $request->instagram;

        $trainer->save();

        // Redirect to the trainers index with a success message
        return redirect()->route('trainers.index')->with('success', 'Trainer added successfully');
    }

    public function UpdateTrainer(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        // Process photo file upload
        if ($request->hasFile('photo')) {
            $photoFile = $request->file('photo');
            $photoName = time() . '_' . $photoFile->getClientOriginalName();
            $photoFile->move(public_path('uploads/trainers'), $photoName);
            $photoPath = 'uploads/trainers/' . $photoName;
        }


        // UpdateTrainer is same as AddNewData  but only below line is changed

        $trainer  = Trainer::find($request->input('id'));
        $trainer->name = $request->input('name');
        $trainer->photo = $photoPath;
        $trainer->facebook = $request->input('facebook');
        $trainer->twitter = $request->input('twitter');
        $trainer->instagram = $request->input('instagram');
        $trainer->save();

        return redirect()->back()->with('success', 'New data added successfully');
    }
    public function DeleteTrainer($id)
    {
        $trainer = Trainer::find($id);
        $trainer->delete();
        return redirect()->route('trainers.index')->with('success', 'Trainer added sucessfully.');
    }
}
