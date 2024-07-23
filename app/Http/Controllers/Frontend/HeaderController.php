<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\GymName;
use Illuminate\Http\Request;

class HeaderController extends Controller
{

    public function index()
    {
        $slider = Data::all();

        // $gymnames = GymName::all();
        $gymnames = GymName::first();

        // // Handle the case when no gym name record is found
        // if (!$gymnames) {
        //     $gymnames = (object) [
        //         'gymname' => 'Default Gym',
        //         'home' => 'Home',
        //         'whyus' => 'Why Us',
        //         'trainers' => 'Trainers',
        //         'contactus' => 'Contact Us'
        //     ];
        // }


        return view('frontend.layouts.header', compact('gymnames', 'slider'));
    }
}
