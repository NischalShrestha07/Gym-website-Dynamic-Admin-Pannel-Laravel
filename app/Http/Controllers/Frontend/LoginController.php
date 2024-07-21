<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $detail = Data::latest()->first();
        $slider = $detail ? $detail->homeimage : "default home image";
        $contactimage = $detail ? $detail->contactimage : "default home image";


        return view('frontend.login', compact('slider', 'contactimage'));
        // return view('frontend.login');
    }
    public function loginUsers(){
        
    }
}
