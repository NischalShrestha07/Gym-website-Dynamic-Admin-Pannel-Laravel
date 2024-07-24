<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Footerbar;
use App\Models\Trainer;
use App\Models\User;
use App\Models\Whyus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        $whyuss = Whyus::all();

        $footerbars = Footerbar::all();
        $detail = Data::latest()->first();
        $slider = $detail ? $detail->homeimage : "default home image";
        $contactimage = $detail ? $detail->contactimage : "default home image";
        $footerbars = Footerbar::all();
        $trainers = Trainer::all();

        return view('frontend.login', compact('slider', 'trainers', 'whyuss', 'contactimage', 'footerbars'));
        // return view('frontend.login');
    }


    public function loginUser(Request $data)
    {
        $user = User::where('email', $data->input('email'))->first();


        if ($user && Hash::check($data->input('password'), $user->password)) {
            Session::put('id', $user->id);
            Session::put('type', $user->type);
            // here Facades Session should be used


            if ($user->type == 'Customer') {
                return redirect()->route('frontend.dashboards');
            } else {
                return redirect('/admin'); // Route you to the dashboard 
            }
        } else {
            return redirect('login')->with('error', 'Your Email/Password is incorrect.');
        }
    }
}
