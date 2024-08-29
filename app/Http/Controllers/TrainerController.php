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
            'photo' => 'required|image',
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
        return redirect()->route('trainers.index')->with('success', 'Trainer Added Successfully');
    }
    public function UpdateTrainer(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // 'photo' is nullable
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        // Find the trainer
        $trainer = Trainer::find($request->input('id'));

        if (!$trainer) {
            return redirect()->route('trainers.index')->with('error', 'Trainer not found');
        }

        // Process photo file upload if present
        if ($request->hasFile('photo')) {
            $photoFile = $request->file('photo');

            if ($photoFile->isValid()) {
                $photoName = time() . '_' . $photoFile->getClientOriginalName();
                $photoFile->storeAs('uploads/trainers', $photoName, 'public');
                $trainer->photo = 'uploads/trainers/' . $photoName;  // Update photo path
            } else {
                return redirect()->back()->with('error', 'Invalid photo file');
            }
        }

        // Update the trainer details
        $trainer->name = $request->input('name');
        $trainer->facebook = $request->input('facebook');
        $trainer->twitter = $request->input('twitter');
        $trainer->instagram = $request->input('instagram');
        $trainer->save();

        return redirect()->route('trainers.index')->with('success', 'Trainer Updated Successfully');
    }

    public function DeleteTrainer($id)
    {
        $trainer = Trainer::find($id);
        $trainer->delete();
        return redirect()->route('trainers.index')->with('success', 'Trainer Deleted Sucessfully.');
    }
}
