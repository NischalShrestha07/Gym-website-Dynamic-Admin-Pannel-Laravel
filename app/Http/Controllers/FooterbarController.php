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
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string',

        ]);
        if ($request->hasFile('pic')) {
            $picPath = $request->file('pic')->store('uploads/footerbars', 'public');
        }

        // Create a new footerbar record
        $footerbar = new Footerbar();
        $footerbar->name = $request->name;
        $footerbar->pic = $picPath;
        $footerbar->save();

        // Redirect to the trainers index with a success message
        return redirect()->route('footerbars.index')->with('success', 'Footerbar Added successfully');
    }

    public function UpdateFooterbar(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $footerbar  = Footerbar::find($request->input('id'));


        // Process pic file upload
        if ($request->hasFile('pic')) {
            $picFile = $request->file('pic');
            $picName = time() . '_' . $picFile->getClientOriginalName();
            $picFile->storeAs('uploads/footerbars/', $picName, 'public');
            $footerbar->pic = 'uploads/footerbars/' . $picName;
        }


        // UpdateTrainer is same as AddNewData  but only below line is changed
        $footerbar->name = $request->input('name');
        // $footerbar->pic = $picPath;

        $footerbar->save();

        return redirect()->back()->with('success', 'New data added successfully');
    }


    public function DeleteFooterbar($id)
    {
        $footerbar = Footerbar::find($id);
        $footerbar->delete();
        return redirect()->route('footerbars.index')->with('success', 'Footerbar Deleted succesfully.');
    }
}
