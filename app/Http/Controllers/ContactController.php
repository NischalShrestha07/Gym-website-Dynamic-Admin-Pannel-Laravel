<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function contacts()
    {
        $contacts = Contact::all();
        return view('Dashboard.contacts', compact('contacts'));
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
            'phone' => 'required|string|max:15',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
    public function AddNewContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phoneNo' => 'required|string',
            'message' => 'required|string',
        ]);
        $mess = new Contact();
        $mess->name = $request->name;
        $mess->email = $request->email;
        $mess->phoneNo = $request->phoneNo;
        $mess->message = $request->message;

        return redirect()->route('contacts.index')->with('success', 'Message Details Added successfully.');
    }

    public function UpdateContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phoneNo' => 'required|string',
            'message' => 'required|string',
        ]);

        $mess = Contact::find($request->input('id'));
        $mess->name = $request->input('name');
        $mess->email = $request->input('email');
        $mess->phoneNo = $request->input('phoneNo');
        $mess->message = $request->input('message');
        $mess->save();
        return redirect()->back()->with('success', ' Data Updated successfully.');
    }
    public function DeleteContact($id)
    {
        $mass = Contact::find($id);
        $mass->delete();
        return redirect()->route('contacts.index')->with('success', 'Message Deleted sucessfully.');
    }
}
