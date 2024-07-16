<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('Dashboard.index');
    }
    public function home()

    {
        //Home is the model and all()method copy evrything and paste it into compact which will place everything in array form
        $homes = Home::all();

        return view('Dashboard.home', compact('homes'));
        // return view('Dashboard.home');
    }
}
