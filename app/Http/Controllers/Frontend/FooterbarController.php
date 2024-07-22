<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Footerbar;
use Illuminate\Http\Request;

class FooterbarController extends Controller
{
    public function index()
    {
        $detail = Data::latest()->first();
        $slider = $detail ? $detail->homeimage : "default home image";

        $footerbars = Footerbar::all();
        return view('frontend.footerbar', compact('footerbars', 'slider'));
    }
}
