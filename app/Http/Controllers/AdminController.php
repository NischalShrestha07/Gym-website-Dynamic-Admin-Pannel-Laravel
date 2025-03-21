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


    // public function UpdateData(Request $request)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'title' => 'nullable|string',
    //         'homeimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'contactimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'description' => 'nullable|string',
    //     ]);

    //     // Process homeimage file upload
    //     if ($request->hasFile('homeimage')) {
    //         $homeImageFile = $request->file('homeimage');
    //         $homeImageName = time() . '_' . $homeImageFile->getClientOriginalName();
    //         $homeImageFile->move(public_path('uploads/datas'), $homeImageName);
    //         $homeImagePath = 'uploads/datas/' . $homeImageName;
    //     }

    //     // Process contactimage file upload
    //     if ($request->hasFile('contactimage')) {
    //         $contactImageFile = $request->file('contactimage');
    //         $contactImageName = time() . '_' . $contactImageFile->getClientOriginalName();
    //         $contactImageFile->move(public_path('uploads/datas'), $contactImageName);
    //         $contactImagePath = 'uploads/datas/' . $contactImageName;
    //     }
    //     // UpdateData is same as AddNewData  but only below line is changed

    //     $data = Data::find($request->input('id'));
    //     $data->title = $request->input('title');
    //     $data->homeimage = $homeImagePath;
    //     $data->contactimage = $contactImagePath;
    //     $data->description = $request->input('description');
    //     $data->save();

    //     return redirect()->back()->with('success', 'HomePage Details Updated Successfully.');
    // }


    public function UpdateData(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'nullable|string',
            'homeimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contactimage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        // Find the data record to update
        $data = Data::findOrFail($request->input('id'));

        // Process homeimage file upload only if a new file is provided
        if ($request->hasFile('homeimage')) {
            // Delete the old image if it exists (optional, to avoid clutter)
            if ($data->homeimage && file_exists(public_path($data->homeimage))) {
                unlink(public_path($data->homeimage));
            }

            $homeImageFile = $request->file('homeimage');
            $homeImageName = time() . '_' . $homeImageFile->getClientOriginalName();
            $homeImageFile->move(public_path('uploads/datas'), $homeImageName);
            $data->homeimage = 'uploads/datas/' . $homeImageName;
        }

        // Process contactimage file upload only if a new file is provided
        if ($request->hasFile('contactimage')) {
            // Delete the old image if it exists (optional, to avoid clutter)
            if ($data->contactimage && file_exists(public_path($data->contactimage))) {
                unlink(public_path($data->contactimage));
            }

            $contactImageFile = $request->file('contactimage');
            $contactImageName = time() . '_' . $contactImageFile->getClientOriginalName();
            $contactImageFile->move(public_path('uploads/datas'), $contactImageName);
            $data->contactimage = 'uploads/datas/' . $contactImageName;
        }

        // Update other fields (title and description) only if provided
        $data->title = $request->input('title', $data->title); // Retain old value if null
        $data->description = $request->input('description', $data->description); // Retain old value if null
        $data->save();

        return redirect()->back()->with('success', 'HomePage Details Updated Successfully.');
    }
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
