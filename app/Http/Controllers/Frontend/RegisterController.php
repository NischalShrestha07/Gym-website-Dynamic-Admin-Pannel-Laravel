<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Footerbar;
use App\Models\User;
use Illuminate\Http\Request;

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


    public function registerUsers(Request $data)
    {
        $newUser = new User();
        $newUser->fullname = $data->input('fullname');
        $newUser->email = $data->input('email');
        $newUser->password = $data->input('password');
        $newUser->picture = $data->file('file')->getClientOriginalName(); // save the image in databasse
        $data->file('file')->move('uploads/profiles' . $newUser->picture);
        $newUser->type = "Customer";
        if ($newUser->save()) {
            return redirect('login')->with('success', 'Your account is ready to use.');
        }
    }
}
