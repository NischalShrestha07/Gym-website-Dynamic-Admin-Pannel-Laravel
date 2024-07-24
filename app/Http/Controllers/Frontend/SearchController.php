<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('query', ''); // Retrieve the search query
        $find = $search ? Search::where('fullname', 'LIKE', "%$search%")->get() : Search::all();

        return view('frontend.layouts.header', [
            'search' => $search,
            'find' => $find
        ]);
    }
}
