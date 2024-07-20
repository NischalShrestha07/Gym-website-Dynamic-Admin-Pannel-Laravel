<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainersController extends Controller
{
    public function index()
    {
        $detail = Data::latest()->first();
        $slider = $detail ? $detail->homeimage : "defaukt home image";
        return view('frontend.trainer', compact('slider'));
    }
}
