<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Data;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('Dashboard.index');
    }
    public function datas()
    {

        $datas = Data::all();

        return view('Dashboard.datas', compact('datas'));
    }

    public function AddNewData(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'nullable|string',
            'homeimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contactimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        // Process homeimage file upload
        if ($request->hasFile('homeimage')) {
            $homeImageFile = $request->file('homeimage');
            $homeImageName = time() . '_' . $homeImageFile->getClientOriginalName();
            $homeImageFile->move(public_path('uploads/datas'), $homeImageName);
            $homeImagePath = 'uploads/datas/' . $homeImageName;
        }

        // Process contactimage file upload
        if ($request->hasFile('contactimage')) {
            $contactImageFile = $request->file('contactimage');
            $contactImageName = time() . '_' . $contactImageFile->getClientOriginalName();
            $contactImageFile->move(public_path('uploads/datas'), $contactImageName);
            $contactImagePath = 'uploads/datas/' . $contactImageName;
        }

        // Create new data entry
        $data = new Data();
        $data->title = $request->input('title');
        $data->homeimage = $homeImagePath;
        $data->contactimage = $contactImagePath;
        $data->description = $request->input('description');
        $data->save();

        return redirect()->back()->with('success', 'HomePage Details Added Successfully.');
    }


    public function UpdateData(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'nullable|string',
            'homeimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contactimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        // Process homeimage file upload
        if ($request->hasFile('homeimage')) {
            $homeImageFile = $request->file('homeimage');
            $homeImageName = time() . '_' . $homeImageFile->getClientOriginalName();
            $homeImageFile->move(public_path('uploads/datas'), $homeImageName);
            $homeImagePath = 'uploads/datas/' . $homeImageName;
        }

        // Process contactimage file upload
        if ($request->hasFile('contactimage')) {
            $contactImageFile = $request->file('contactimage');
            $contactImageName = time() . '_' . $contactImageFile->getClientOriginalName();
            $contactImageFile->move(public_path('uploads/datas'), $contactImageName);
            $contactImagePath = 'uploads/datas/' . $contactImageName;
        }
        // UpdateData is same as AddNewData  but only below line is changed

        $data = Data::find($request->input('id'));
        $data->title = $request->input('title');
        $data->homeimage = $homeImagePath;
        $data->contactimage = $contactImagePath;
        $data->description = $request->input('description');
        $data->save();

        return redirect()->back()->with('success', 'HomePage Details Updated Successfully.');
    }
    // public function DeleteData($id)
    // {
    //     $data = Data::find($id);
    //     $data->delete();
    //     return redirect()->route('datas.destroy')->with('success', 'Data Deleted succesfully.');
    // }
    public function DeleteData($id)
    {
        // Attempt to find the data by ID
        $data = Data::find($id);

        // Check if the data exists
        if (!$data) {
            return redirect()->route('datas.index')->with('error', 'Data Not Found.');
        }

        // Delete the data
        $data->delete();

        // Redirect to the index route with a success message
        return redirect()->route('datas.index')->with('error', 'HomePage Details Deleted Successfully.');
    }
}
