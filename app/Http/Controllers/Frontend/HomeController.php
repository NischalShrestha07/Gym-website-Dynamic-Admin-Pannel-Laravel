<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Trainer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $detail = Data::latest()->first();
        //dd($detail);
        $title = $detail ? $detail->title : "default title";
        $description = $detail ? $detail->description : "default description";
        $slider = $detail ? $detail->homeimage : "default Slider Image";
        $contactimage = $detail ? $detail->contactimage : "default contact image";
        //dd($slider);
        return view('frontend.index', compact('title', 'slider', 'description', 'contactimage'));
    }
    public function trainer()
    {
        $manage = Trainer::latest()->first();
        $name = $manage ? $manage->name : "default Title";
        $photo = $manage ? $manage->photo : "default Title";
        $facebook = $manage ? $manage->facebook : "default Facebook";
        $twitter = $manage ? $manage->twitter : "default Twitter";
        $instagram = $manage ? $manage->instagram : "default Instagram";
    }
}
