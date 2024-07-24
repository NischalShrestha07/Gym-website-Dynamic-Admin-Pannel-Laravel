<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Footerbar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $footerbars = Footerbar::all();
        $detail = Data::latest()->first();
        $slider = $detail ? $detail->homeimage : "default home image";
        $contactimage = $detail ? $detail->contactimage : "default home image";
        return view('frontend.register', compact('slider', 'contactimage', 'footerbars'));
    }


    public function registerUser(Request $data)
    {
        // $newUser is a variable ->fullname is an attributes from the model and $data->input('fullname'); retrieves the fullname/datas provided through the form 
        $newUser = new User();
        $newUser->fullname = $data->input('fullname');
        $newUser->email = $data->input('email');
        // $newUser->password = $data->input('password');// this line of code stores the password in the plain text in database so to make that convert into Bcrpt algorithm which is the default hashing algorithm used in Laravel for passwords.

        $newUser->password = Hash::make($data->input('password')); // this stores the password using bcrpt algo in symboled form

        $newUser->picture = $data->file('file')->getClientOriginalName(); // save the image in databasse
        $data->file('file')->move('uploads/profiles' . $newUser->picture);
        $newUser->type = "Customer";
        if ($newUser->save()) {
            return redirect('login')->with('success', 'Your account is ready to use.');
        } else {
            return redirect('login')->with('error', 'Your Email/Password is incorrect.');
        }
    }
}
