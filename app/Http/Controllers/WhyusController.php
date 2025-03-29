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

    public function whyuss()
    {
        $whyuss = Whyus::all();
        return view('Dashboard.whyuss', compact('whyuss'));
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

        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('uploads/whyuss', 'public');
        }

        $whyus = new Whyus();
        $whyus->img = $imgPath;
        $whyus->title = $request->title;
        $whyus->description = $request->description;
        $whyus->head = $request->head;
        $whyus->headdetail = $request->headdetail;
        $whyus->save();

        return redirect()->route('whyuss.index')->with('success', 'New Whyus Added Successfully.');
    }

    public function UpdateWhyus(Request $request)
    {
        $request->validate([
            'img' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'head' => 'nullable|string',
            'headdetail' => 'nullable|string',
        ]);

        $data = Whyus::find($request->input('id'));

        // Handle file upload
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('uploads/whyuss', 'public');
            $data->img = $imgPath;
        }

        // Only update the image path if there's a new image
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->head = $request->input('head');
        $data->headdetail = $request->input('headdetail');
        $data->save();

        return redirect()->back()->with('success', 'Whyus Updated Successfully.');
    }

    public function DeleteWhyus($id)
    {
        $whyus = Whyus::find($id);
        $whyus->delete();
        return redirect()->route('whyuss.index')->with('error', 'Whyus Deleted Successfully.');
    }
}
