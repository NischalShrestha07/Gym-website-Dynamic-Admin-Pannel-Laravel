<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Footerbar;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainersController extends Controller
{
    public function index()
    {
        $detail = Data::latest()->first();
        $slider = $detail ? $detail->homeimage : "defaukt home image";
        $footerbars = Footerbar::all();
        $trainers = Trainer::all();
        return view('frontend.trainer', compact('slider', 'trainers', 'footerbars'));
    }
}
