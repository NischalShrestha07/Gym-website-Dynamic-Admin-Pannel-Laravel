<?php

namespace App\Http\Controllers;

use App\Models\Whyus;
use Illuminate\Http\Request;

class WhyusController extends Controller
{
    public function index()
    {
        return view('Dashboard.index');
    }
    public function whyus()
    {
        $whyus = Whyus::all();
        return view('Dashboard.whyus', compact('whyus'));
    }
    public function AddNewWhyus(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string',
            'description' => 'required|string',
            'head' => 'required|string',
            'headdetail' => 'required|string',
        ]);

        // Handle File Upload
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('uploads/whyus', 'public');
        }

        // Create a new trainer record
        $whyus = new Whyus();
        $whyus->img = $imgPath;
        $whyus->title = $request->title;
        $whyus->description = $request->description;
        $whyus->head = $request->head;
        $whyus->headdetail = $request->headdetail;

        $whyus->save();

        // Redirect to the whyus index with a success message
        return redirect()->route('whyus.index')->with('success', 'Whyus added successfully');
    }

    public function UpdateWhyus(Request $request)
    {
        // Validate the request
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string',
            'description' => 'required|string',
            'head' => 'required|string',
            'headdetail' => 'required|string',
        ]);

        // Process img file upload
        if ($request->hasFile('img')) {
            $imgFile = $request->file('img');
            $imgName = time() . '_' . $imgFile->getClientOriginalName();
            $imgFile->move(public_path('uploads/whyus'), $imgName);
            $imgPath = 'uploads/whyus/' . $imgName;
        }


        // UpdateTrainer is same as AddNewData  but only below line is changed

        $whyus  = Whyus::find($request->input('id'));
        $whyus->img = $imgPath;
        $whyus->title = $request->input('title');
        $whyus->description = $request->input('description');
        $whyus->head = $request->input('head');
        $whyus->headdetail = $request->input('headdetail');
        $whyus->save();

        return redirect()->back()->with('success', 'New data added successfully');
    }
}
