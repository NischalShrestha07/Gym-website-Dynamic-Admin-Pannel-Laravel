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

        return redirect()->route('contacts.index')->with('success', 'Message Details added successfully.');
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
        return redirect()->back()->with('success', ' Data updated successfully.');
    }
    public function DeleteContact($id)
    {
        $mass = Contact::find($id);
        $mass->delete();
        return redirect()->route('contacts.index')->with('success', 'Message deleted sucessfully.');
    }
}
