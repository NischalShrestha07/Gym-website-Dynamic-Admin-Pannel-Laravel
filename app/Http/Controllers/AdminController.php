<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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



    // public function update(Request $request, $id)
    // {
    //     Log::info('Update method called with ID: ' . $id);

    //     $home = Home::find($id);
    //     Log::info('Home found: ' . json_encode($home));

    //     // Validate request
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'HomeImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'Description' => 'required|string',
    //         'ContactImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     Log::info('Request validated successfully.');

    //     // Update title and description
    //     $home->title = $request->input('title');
    //     $home->Description = $request->input('Description');

    //     // Update Home Image
    //     if ($request->hasFile('HomeImage')) {
    //         $homeImage = $request->file('HomeImage');
    //         $homeImageName = time() . '_' . $homeImage->getClientOriginalName();
    //         $homeImage->move(public_path('uploads/homes'), $homeImageName);
    //         $home->HomeImage = $homeImageName;
    //     }

    //     // Update Contact Image
    //     if ($request->hasFile('ContactImage')) {
    //         $contactImage = $request->file('ContactImage');
    //         $contactImageName = time() . '_' . $contactImage->getClientOriginalName();
    //         $contactImage->move(public_path('uploads/homes'), $contactImageName);
    //         $home->ContactImage = $contactImageName;
    //     }

    //     $home->save();

    //     Log::info('Home updated successfully.');

    //     return redirect()->route('homes.index')->with('success', 'Home updated successfully');
    // }
}
