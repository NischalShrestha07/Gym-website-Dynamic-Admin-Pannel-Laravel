<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Footerbar;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $footerbars = Footerbar::all();
        $detail = Data::latest()->first();
        $slider = $detail ? $detail->homeimage : "default home image";
        $contactimage = $detail ? $detail->contactimage : "default home image";


        return view('frontend.login', compact('slider', 'contactimage', 'footerbars'));
        // return view('frontend.login');
    }
    public function loginUser(Request $data)
    {
        $user = User::where('email', $data->input('email'))->where('password', $data->input('password'))->first();
        //first() is used to read first row only from the database.
    }
}
