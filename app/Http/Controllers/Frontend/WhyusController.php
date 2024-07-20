<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;

class WhyusController extends Controller
{
    public function index()
    {
        $detail = Data::latest()->first();
        $slider = $detail ? $detail->homeimage : "defaukt home image";
        return view('frontend.why', compact('slider'));
    }
}
