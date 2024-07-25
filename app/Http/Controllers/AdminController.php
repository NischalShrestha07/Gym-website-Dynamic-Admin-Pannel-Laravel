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
            'title' => 'required|string|max:255',
            'homeimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contactimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
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

        return redirect()->back()->with('success', 'New data added successfully');
    }


    public function UpdateData(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'homeimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contactimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
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

        return redirect()->back()->with('success', 'New data added successfully');
    }
    public function DeleteData($id)
    {
        $data = Data::find($id);
        $data->delete();
        return redirect()->route('datas.destroy')->with('success', 'Data deleted succesfully.');
    }
}
