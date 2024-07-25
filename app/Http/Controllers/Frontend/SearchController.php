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
    public function search(Request $request)
    {
        $keyword = $request->input('q'); //Assuming q is the search parameter

        // Search all three models using OR
        // $results=Trainer::where('name','LIKE','%' . $keyword . '%)->orWhere('description','LIKE','%'.$keyword . '%')->orWhereHas('contact',function($query) use ($keyword){

        // Search in all three models using OR
        // $results = Trainer::where('name', 'LIKE', '%' . $keyword . '%')
        //     ->orWhere('description', 'LIKE', '%' . $keyword . '%')
        //     ->orWhereHas('contacts', function ($query) use ($keyword) {
        //         $query->where('name', 'LIKE', '%' . $keyword . '%');
        //     })
        //     ->union(Contact::where('name', 'LIKE', '%' . $keyword . '%')
        //         ->orWhere('email', 'LIKE', '%' . $keyword . '%'))
        //     ->union(Equipment::where('name', 'LIKE', '%' . $keyword . '%')
        //         ->orWhere('description', 'LIKE', '%' . $keyword . '%'))
        //     ->get();

        // return view('search_results', ['results' => $results]);
    }
}
