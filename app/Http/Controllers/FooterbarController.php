<?php

namespace App\Http\Controllers;

use App\Models\Footerbar;
use Illuminate\Http\Request;

class FooterbarController extends Controller
{
    public function index()
    {
        $footerbars = Footerbar::all();
        return view('Dashboard.index', compact('footerbars'));
    }
    public function footerbars()
    {
        $footerbars = Footerbar::all();
        return view('Dashboard.footerbar', compact('footerbars'));
    }
    public function AddNewFooterbar(Request $request)
    {
        $request->validate([
            'pic' => 'required|image',
            'name' => 'nullable|string',

        ]);
        $picPath = 0;
        if ($request->hasFile('pic')) {
            $picPath = $request->file('pic')->store('uploads/footerbars', 'public');
        }

        // Create a new footerbar record
        $footerbar = new Footerbar();
        $footerbar->name = $request->name;
        $footerbar->pic = $picPath;
        $footerbar->save();

        // Redirect to the trainers index with a success message
        return redirect()->route('footerbars.index')->with('success', 'Footerbar Added Successfully');
    }

    public function UpdateFooterbar(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'pic' => 'nullable|image',

        ]);


        $footerbar  = Footerbar::find($request->input('id'));


        // Process pic file upload
        $picPath = 0;
        if ($request->hasFile('pic')) {
            $picPath = $request->file('pic')->store('uploads/footerbars', 'public');
            $footerbar->pic = $picPath;
        }


        // UpdateTrainer is same as AddNewData  but only below line is changed
        $footerbar->name = $request->input('name');
        // $footerbar->pic = $picPath;

        $footerbar->save();

        return redirect()->back()->with('success', 'Footer Details Updated Successfully.');
    }


    public function DeleteFooterbar($id)
    {
        $footerbar = Footerbar::find($id);
        $footerbar->delete();
        return redirect()->route('footerbars.index')->with('success', 'Footerbar Deleted Succesfully.');
    }
}
