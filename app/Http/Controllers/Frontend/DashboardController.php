<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Footerbar;
use App\Models\GymName;
use App\Models\Trainer;
use App\Models\Whyus;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $detail = Data::latest()->first();
        $detail = Data::latest()->first();
        //dd($detail);
        $title = $detail ? $detail->title : "default title";
        $description = $detail ? $detail->description : "default description";
        $slider = $detail ? $detail->homeimage : "default Slider Image";
        $contactimage = $detail ? $detail->contactimage : "default contact image";
        //dd($slider);
        // return view('frontend.index', compact('title', 'slider', 'description', 'contactimage'));
        $man = Data::all();

        // for trainers
        $trainers = Trainer::all();
        $whyuss = Whyus::all();
        $footerbars = Footerbar::all();
        $gymnames = GymName::all();

        // $name = $manage ? $manage->name : "default Title";
        // $photo = $manage ? $manage->photo : "default Title";
        // $facebook = $manage ? $manage->facebook : "default Facebook";
        // $twitter = $manage ? $manage->twitter : "default Twitter";
        // $instagram = $manage ? $manage->instagram : "default Instagram";

        // return view('frontend.index', compact('title', 'slider', 'description', 'contactimage', 'name', 'photo', 'facebook', 'twitter', 'instagram'));
        return view('frontend.dashboards', compact('man', 'title', 'slider', 'description', 'contactimage', 'trainers', 'whyuss', 'footerbars', 'gymnames'));
    }
}
