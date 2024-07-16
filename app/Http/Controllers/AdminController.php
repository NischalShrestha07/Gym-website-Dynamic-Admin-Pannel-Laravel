<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('Dashboard.index');
    }
    public function home()

    {
        //Home is the model and all()method copy evrything and paste it into compact which will place everything in array form
        $homes = Home::all();

        return view('Dashboard.home', compact('homes'));
        // return view('Dashboard.home');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'HomeImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'Description' => 'nullable|string',
            'ContactImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $home = Home::findOrFail($id);

        $home->title = $validatedData['title'];
        $home->Description = $validatedData['Description'];

        if ($request->hasFile('HomeImage')) {
            $image = $request->file('HomeImage');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/homes'), $imageName);
            $home->HomeImage = $imageName;
        }

        if ($request->hasFile('ContactImage')) {
            $contactImage = $request->file('ContactImage');
            $contactImageName = time() . '_' . $contactImage->getClientOriginalName();
            $contactImage->move(public_path('uploads/homes'), $contactImageName);
            $home->ContactImage = $contactImageName;
        }

        $home->save();

        return redirect()->back()->with('success', 'Home updated successfully');
    }
}
