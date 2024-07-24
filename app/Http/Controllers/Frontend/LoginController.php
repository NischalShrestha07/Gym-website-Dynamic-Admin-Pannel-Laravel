<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Footerbar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
    // public function loginUser(Request $data)
    // {
    //     $user = User::where('email', $data->input('email'))->where('password', $data->input('password'))->first();
    //     //first() is used to read first row only from the database.
    //     if ($user) {
    //         session()->put('id', $user->id);
    //         session()->put('type', $user->type);
    //         if ($user->type == 'Customer') {
    //             return redirect('/');
    //         }
    //     } else {
    //         return redirect('login')->with('error', 'Your Email/Password is incorrect.');
    //     }
    // }

    public function loginUser(Request $data)
    {
        $user = User::where('email', $data->input('email'))->first();

        if ($user && Hash::check($data->input('password'), $user->password)) {
            Session::put('id', $user->id);
            Session::put('type', $user->type);
            // here Facades Session should be used
            if ($user->type == 'Customer') {
                return redirect('/');
            } else {
                return redirect('/admin-dashboard'); // Assuming you have an admin dashboard
            }
        } else {
            return redirect('login')->with('error', 'Your Email/Password is incorrect.');
        }
    }
}
