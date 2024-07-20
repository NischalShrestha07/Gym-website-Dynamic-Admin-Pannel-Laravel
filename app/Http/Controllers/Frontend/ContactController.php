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
        $slider = $detail ? $detail->homeimage : "defaukt home image";
        return view('frontend.contact', compact('slider'));
        // return view('frontend.contact');
        // dd($detail);
    }
}
