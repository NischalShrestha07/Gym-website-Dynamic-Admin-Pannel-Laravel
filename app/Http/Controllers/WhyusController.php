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
            'description' => 'nullable|string',
            'head' => 'nullable|string',
            'headdetail' => 'nullable|string',
        ]);

        // Handle File Upload
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('uploads/whyuss', 'public');
            //this prints inside folder of storage
        }

        // Create a new whyus record
        $whyus = new Whyus();
        $whyus->img = $imgPath;
        $whyus->title = $request->title;
        $whyus->description = $request->description;
        $whyus->head = $request->head;
        $whyus->headdetail = $request->headdetail;

        $whyus->save();

        // Redirect to the whyus index with a success message
        return redirect()->route('whyuss.index')->with('success', 'New Whyus Details Added Successfully.');
    }

    // public function UpdateWhyus(Request $request)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'title' => 'required|string',
    //         'description' => 'required|string',
    //         'head' => 'required|string',
    //         'headdetail' => 'required|string',
    //     ]);

    //     // Process img file upload
    //     if ($request->hasFile('img')) {
    //         $imgFile = $request->file('img');
    //         $imgName = time() . '_' . $imgFile->getClientOriginalName();
    //         $imgFile->move(public_path('uploads/whyus'), $imgName); //this prints outside folder of storage
    //         $imgPath = 'uploads/whyus/' . $imgName;
    //     }


    //     // UpdateTrainer is same as AddNewData  but only below line is changed

    //     $whyus  = Whyus::find($request->input('id'));
    //     $whyus->img = $imgPath;
    //     $whyus->title = $request->input('title');
    //     $whyus->description = $request->input('description');
    //     $whyus->head = $request->input('head');
    //     $whyus->headdetail = $request->input('headdetail');
    //     $whyus->save();

    //     return redirect()->back()->with('success', 'Whyus Details Updated Successfully.');
    // }
    public function UpdateWhyus(Request $request)
    {
        // Validate the request
        $request->validate([
            'img' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'head' => 'nullable|string',
            'headdetail' => 'nullable|string',
        ]);

        // // Find the existing record
        // $whyus = Whyus::find($request->input('id'));

        // // Process img file upload if provided
        // if ($request->hasFile('img')) {
        //     // Delete the old image if exists
        //     if (file_exists(public_path($whyus->img))) {
        //         unlink(public_path($whyus->img));
        //     }

        //     $imgFile = $request->file('img');
        //     $imgName = time() . '_' . $imgFile->getClientOriginalName();
        //     $imgFile->move(public_path('uploads/whyuss'), $imgName);
        //     $whyus->img = 'uploads/whyuss/' . $imgName;
        // }

        // // Update other fields
        // $whyus->title = $request->input('title');
        // $whyus->description = $request->input('description');
        // $whyus->head = $request->input('head');
        // $why`us->headdetail = $request->input('headdetail');
        // $whyus->save();

        if ($request->hasFile('img')) {
            $imgFile = $request->file('img');
            $imgName = time() . '_' . $imgFile->getClientOriginalName();
            $imgFile->move(public_path('uploads/datas'), $imgName);
            $imgPath = 'uploads/datas/' . $imgName;
        }

        // UpdateData is same as AddNewData  but only below line is changed

        $data = Whyus::find($request->input('id'));
        $data->title = $request->input('title');
        $data->img = $imgPath;
        $data->description = $request->input('description');


        $data->save();
        return redirect()->back()->with('success', 'Whyus Details Updated Successfully.');
    }





    public function DeleteWhyus($id)
    {
        $whyus = Whyus::find($id);
        $whyus->delete();
        return redirect()->route('whyuss.index')->with('success', 'Whyus Details Deleted Successfully.');
    }
}
