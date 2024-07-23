<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Footerbar;

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
}
