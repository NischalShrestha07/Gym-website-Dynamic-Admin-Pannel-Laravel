<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Data;
use App\Models\Footerbar;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        // $detail = Data::latest()->first();

        $detail = Data::latest()->first();
        $slider = $detail ? $detail->homeimage : "default home image";
        $contactimage = $detail ? $detail->contactimage : "default home image";
        $footerbars = Footerbar::all();

        // $contacts = Data::latest()->first();
        return view('frontend.contact', compact('slider', 'contactimage', 'footerbars'));
        // return view('frontend.contact');
        // dd($detail);
    }

    public function manageContact()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts', compact('contacts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phoneno' => 'required|string|max:15',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
