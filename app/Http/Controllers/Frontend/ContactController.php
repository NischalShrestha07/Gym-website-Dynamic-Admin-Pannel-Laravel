<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;



class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::find(1);
        $contactImage = $contact->image_path;
        return view('frontend.contact', compact('contactImage'));
    }
}
