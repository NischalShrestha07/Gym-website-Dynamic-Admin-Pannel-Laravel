<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Data;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $detail = Data::latest()->first();

        $title = $detail ? $detail->title : "default title";
        $description = $detail ? $detail->description : "default description";
        $homeimage = $detail ? $detail->homeimage : "default homeimage";
        return view('frontend.index', compact('detail', 'title', 'description'));
    }
}
