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
}
