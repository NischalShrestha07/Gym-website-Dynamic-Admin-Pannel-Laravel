<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;

class ContactController extends Controller
{
    // public function index()
    // {
    //     $latestImage = Contact::latest()->first();
    //     $contactimage = $latestImage ? asset('storage/contact_images/' . $latestImage->path) : null;

    //     return view('contact', compact('contactimage'));
    // }
    public function index()
    {
        // $detail = Data::latest()->first();
        return view('frontend.contact');
        // dd($detail);
    }
}
