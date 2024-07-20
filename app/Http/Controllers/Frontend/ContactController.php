<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;

class ContactController extends Controller
{

    public function index()
    {
        // $detail = Data::latest()->first();

        $detail = Data::latest()->first();
        $slider = $detail ? $detail->homeimage : "default home image";
        $contactimage = $detail ? $detail->contactimage : "default home image";

        // $contacts = Data::latest()->first();
        return view('frontend.contact', compact('slider', 'contactimage'));
        // return view('frontend.contact');
        // dd($detail);
    }
}
