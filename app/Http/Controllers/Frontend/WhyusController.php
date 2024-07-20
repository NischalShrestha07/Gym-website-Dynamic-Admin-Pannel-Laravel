<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Whyus;
use Illuminate\Http\Request;

class WhyusController extends Controller
{
    public function index()
    {
        $detail = Data::latest()->first();
        $slider = $detail ? $detail->homeimage : "default home image";

        $whyuss = Whyus::all();
        return view('frontend.whyus', compact('whyuss', 'slider'));


        // return view('frontend.whyus', compact('slider'));
    }
}
