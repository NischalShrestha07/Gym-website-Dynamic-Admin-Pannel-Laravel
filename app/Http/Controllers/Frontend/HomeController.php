<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $detail = Data::latest()->first();
        //dd($detail);
        $title = $detail ? $detail->title : "default title";
        $description = $detail ? $detail->description : "default description";
        $slider = $detail ? $detail->homeimage : "default Slider Image";
        $contactimage = $detail ? $detail->contactimage : "default contact image";
        //dd($slider);
        return view('frontend.index', compact('title', 'slider', 'description', 'contactimage'));
        // return view('frontend.index', compact('title', 'slider', 'description', 'detail')); only for one image
    }
}
