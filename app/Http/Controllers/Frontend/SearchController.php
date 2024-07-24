<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Footerbar;
use App\Models\GymName;
use App\Models\Search;
use App\Models\Trainer;
use App\Models\Whyus;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /*  public function search(Request $request)
    {

        $detail = Data::latest()->first();
        $title = $detail ? $detail->title : "default title";
        $description = $detail ? $detail->description : "default description";
        $slider = $detail ? $detail->homeimage : "default Slider Image";
        $contactimage = $detail ? $detail->contactimage : "default contact image";
        $man = Data::all();

        $trainers = Trainer::all();
        $whyuss = Whyus::all();
        $footerbars = Footerbar::all();
        $gymnames = GymName::all();



        $search = $request->input('query', ''); // Retrieve the search query
        // $find = $search ? Search::where('fullname', 'LIKE', "%$search%")->get() : [];

        if (stripos($search, 'trainers') != false) {
            return redirect()->route('frontend.trainer');
        } elseif (stripos($search, 'facilities') != false) {
            return redirect()->route('frontend.whyus');
        } else {

            return view('frontend.index', compact('man', 'title', 'slider', 'search',  'description', 'contactimage', 'trainers', 'whyuss', 'footerbars', 'gymnames'));


            //below is also another way of compacting
            // return view('frontend.layouts.header', [
            //     'search' => $search,
            //     'find' => []
            // ]);
        }
    }
        */

    public function search(Request $request)
    {
        $trainers = Trainer::all();
        $whyuss = Whyus::all();
        $footerbars = Footerbar::all();
        $search = $request->input('query', ''); // Retrieve the search query

        // Sample data for demonstration (replace with your actual data or logic)
        $data = [
            'trainers' => [
                'Jeff laid',
                'Cristiano Ronaldo',
                'Alex Den',
            ],

        ];

        $find = [];
        if (stripos($search, 'trainers') !== false) {
            $find = array_filter($data['trainers'], function ($trainer) use ($search) {
                return stripos($trainer, $search) !== false;
            });
            return view('frontend.trainer', ['trainers' => $find]); // Redirect to trainers page
        }

        // Default to displaying results on the same page
        return view('frontend.index', compact('search', 'find', 'trainers', 'whyuss', 'footerbars'));
    }
}
